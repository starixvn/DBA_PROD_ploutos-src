<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Utility\DepthLooper;
use PandoraBundle\Utility\MultipleException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Youshido\GraphQL\Type\TypeMap;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Query\QueryBuilder;
use FOS\UserBundle\Doctrine\UserManager;

abstract class AbstractResolver
{
    /** @var EntityManagerInterface */
    public $default_em;
    
    /** @var EntityManagerInterface */
    public $pandora_em;
    
    /** @var EntityManagerInterface */
    public $promoted_em;
    
    /** @var UserManager */
    public $userManager;
    
    /** @var ContainerInterface */
    public $container;
    
    /** @var $args[] */
    public $args;
    
    public $entity;
    
    protected $currentUser;
    
    /** @var $info[] */
    protected $info;

    /** @var QueryBuilder */
    protected $query;

    /** @var $totalCount */
    protected $totalCount = 0;

    /** @var $targetEntity */
    protected $targetEntity;

    /** @var $fieldArrayJoinery */
    protected $fieldArrayJoinery;

    /** @var $rawFieldArrayJoinery */
    protected $rawFieldArrayJoinery;

    /** @var $fieldArray */
    protected $fieldArray;

    /** @var $whereCluaseAndParams */
    protected $whereCluaseAndParams;
    
    protected $timerStart;
    protected $timerEnd;
    
    /* TODO: THIS HAS BEEN ADDED BY KIM G */
    /**
     * This constructor takes 4 arguments
     *
     * @return void
     */
    function __construct(EntityManagerInterface $pandora_em, EntityManagerInterface $default_em, UserManager $userManager, ContainerInterface $container)
    {
        $this->promoted_em = $pandora_em; // THIS WILL BE THE DEFAULT PROMOTED ENITY MANAGER UNLESS OVERRIDEN
        $this->pandora_em = $pandora_em;
        $this->default_em = $default_em;
        $this->userManager = $userManager;
        $this->container = $container;
        
        $tokenStorage = $this->container->get('security.token_storage')->getToken();
        if($tokenStorage != null){
            $this->currentUser = $tokenStorage->getUser();
        }
        
        $this->timerStart = microtime(true);
    }
    
    /**
     * Saves values to its own properties and prepares 
     * selected fields in graphQL to be readily available by extension objects
     *
     * @return void
     */
    public function initAbstractResolver($args = [], $info = [])
    {
        $this->args = $args;
        $this->info = $info;
        $this->fieldArray = (count($info) > 0 && is_object($info[0])) ? DepthLooper::extractNodeFields($this->info) : $this->info;
    }
    
    /**
     * Queries the subject entity and overrides values based on 
     * new inputs from graphQL, after this the entity is now ready to be committed on database
     *
     * @return void
     */
    public function prepareEntity($targetClass){
        if($this->args['entity']['Id'] > 0){
            $this->entity = $this->promoted_em->getRepository($targetClass)->findOneBy(['Id'=> $this->args['entity']['Id']]);
        }else{
            $this->entity = new $targetClass;
        }
        
        // FOREACH ENTITY TO OVERRIDE VALUES
        if($this->entity){
            foreach ($this->args['entity'] as $key => $value){
                $methodName = 'set'.$key;
                if(method_exists ($this->entity, $methodName)){
                    $this->entity->$methodName($value);
                }
            }
        }
    }
    
    /**
     * Uses validation of doctrine defined in entity/model 
     * (eg. NotBlank() and etc). This iterates all validation, 
     * throws Array of error Exceptions if there otherwise returns 
     * true which means entity is valid and is safe to save in database
     *
     * @return mixed
     */
    public function validateEntity(){
        $validator = $this->container->get('validator');
        $errors = $validator->validate($this->entity);
        if(count($errors) > 0){
            throw new \Exception(MultipleException::entityError($errors));
        }else{
            return true;
        }
    }
    
    /**
     * This method commits the entity to the database, assumes that 
     * the prepareEntity() and validateEntity() has been executed prior
     *
     * @return mixed
     */
    public function mergeEntity(){
        try{
            if($this->entity->getId() > 0){
                // SET MODIFICATION INFORMATION
                $this->entity->setModifiedById($this->currentUser->getAspNetUserId());
                $this->entity->setDateModified(new \DateTime('NOW'));
                
                $this->promoted_em->merge($this->entity);
            }else{
                // SET CREATION INFORMATION
                $this->entity->setCreatedById($this->currentUser->getAspNetUserId());
                $this->entity->setDateCreated(new \DateTime('NOW'));
                
                // SET MODIFICATION INFORMATION
                $this->entity->setModifiedById($this->currentUser->getAspNetUserId());
                $this->entity->setDateModified(new \DateTime('NOW'));
                
                $this->promoted_em->persist($this->entity);
            }
            
            $this->promoted_em->flush();
            $this->args['Id'] = $this->entity->getId();
            // TODO : WHEN IN MODIFY MODE Id IS NOT EXISTENT SINCE FIELDs ARE 1 LAYER DEEP in entity index of ARRAY
            return $this->args['Id'];
        }catch(\Exception $err){
            throw new \Exception($err);
            return false;
        }
    }
    
    /**
     * Selects fields came from graphQL for Query, part of QueryBuilding Process
     *
     * @return void
     */
    public function queryBuilderSelect(){
        $this->query->select($this->fieldArrayJoinery);
    }
    
    /**
     * Chooses FROM table that came from graphQL for Query, part of QueryBuilding Process
     *
     * @return void
     */
    public function queryBuilderFrom(){
        $this->query->from($this->targetEntity, 'a');
    }
    
    /**
     * Use to paginate results, this also queries total of 
     * records for a particular search filter is also applied 
     * to total counts, part of QueryBuilding Process
     *
     * @return void
     */
    public function getQueryBuilderPagingResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        $results = $this->query->getQuery()->getResult();
        
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if(isset($this->args['count']) && $this->args['count']){
            $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    /**
     * Querries single result record
     *
     * @return void
     */
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        if(isset($this->args['Id'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        return $this->query->getQuery()->getResult();
    }
    
    /**
     * Joins default Entities
     * 
     * @return void
     */
    public function joinModifierAspEntities(){
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'x.') !== false){
            $this->query->leftjoin('a.CreatedBy', 'x');
        }
        if(strpos($implodedField, 'y.') !== false){
            $this->query->leftjoin('a.ModifiedBy', 'y');
        }
    }
    
    /**
     * Initializes QueryBuilder, this method calls other method like 
     * queryBuilderWhereAndParameters(), queryBuilderOrderBy() 
     * and sets max queries as well as FirstResult().
     * Tightly coupled with other method that is in QueryBuilding Process
     * 
     * @return void
     */
    public function prepareQueryBuilder()
    {
        // PREPARE QUERY OBJECT
        $this->query = $this->promoted_em->createQueryBuilder();
        
        // APPLY WHERE CLAUSE
        $this->queryBuilderWhereAndParameters();
        
        // SORTING AND GROUPING
        $this->queryBuilderOrderBy();
        $this->queryBuilderGroupBy();
        
        // OFFSET LIMIT / FIRST RESULT / MAX RESULT
        if (isset($this->args['paging'])) {
            $this->query->setFirstResult($this->args['paging']['offset']);
            $this->query->setMaxResults($this->args['paging']['limit']);
            
            // SET MAXIMUM LIMIT TO 500 ONLY
            if(isset($this->args['paging']['limit']) && $this->args['paging']['limit'] > 500){
                $this->query->setMaxResults(500);
            }
        } else {
            $this->query->setMaxResults(10);
        }
        
        // IF EXPORT IS PRESENT OVERRIDE MAXRESULT AND SETFIRSTRESULT
        if(isset($this->args['export']) && $this->args['export']){
            $this->query->setFirstResult(0);
            $this->query->setMaxResults(3000); // 3k MAX RECORD
        }
    }
    
    /**
     * Applies WHERE CLAUSE to the query, parameters came from graphQL inputs, part of QueryBuilding Process.
     * This method also applies Business rules of filtering based on current Users Assigned Market (Brand and Currency)
     *
     * @return void
     */
    public function queryBuilderWhereAndParameters()
    {
        $parameters = [];
        if (isset($this->args['filter']) && count($this->args['filter']) > 0) {
            foreach ($this->args['filter'] as $key => $value) {
                if(!empty($value['expression'])){
                    switch ($value['expression']) {
                        case '%@%': // CONTAINS
                            if(isset($value['parameter']) && $value['parameter'] !== ''){
                                $this->query->andWhere($this->query->expr()->like($this->useFieldAlias($this->rawFieldArrayJoinery[$key]['joineryTerm']), ':'.$key));
                                $parameters[$key] = '%'.$value['parameter'].'%';
                            }
                            break;
                        case 'BETWEEN':
                            if(isset($value['parameter']) && isset($value['parameter_one']) && $value['parameter'] !== '' && $value['parameter_one'] !== ''){
                                if(is_a($value['parameter'], 'DateTime')){
                                    $this->query->andWhere('DATE('.$this->useFieldAlias($this->rawFieldArrayJoinery[$key]['joineryTerm']).') BETWEEN :start_'.$key.' AND :end_'.$key);
                                }else{
                                    $this->query->andWhere($this->useFieldAlias($this->rawFieldArrayJoinery[$key]['joineryTerm']).' BETWEEN :start_'.$key.' AND :end_'.$key);
                                }
                                $parameters['start_'.$key] = $value['parameter'];
                                $parameters['end_'.$key] = $value['parameter_one'];
                            }
                            break;
                        case 'IS_IN_ARRAY':
                            $this->query->andWhere($this->query->expr()->in($this->useFieldAlias($this->rawFieldArrayJoinery[$key]['joineryTerm']), ':'.$key));
                            $parameters[$key] = $value['parameter'];
                            break;
                        default:
                            if(isset($value['parameter']) && $value['parameter'] !== ''){
                                if(is_a($value['parameter'], 'DateTime')){
                                    $this->query->andWhere('DATE('.$this->useFieldAlias($this->rawFieldArrayJoinery[$key]['joineryTerm']).') ' . $value['expression'] . ' :' . $key);
                                }else{
                                    $this->query->andWhere($this->useFieldAlias($this->rawFieldArrayJoinery[$key]['joineryTerm']) . ' ' . $value['expression'] . ' :' . $key);
                                }
                                $parameters[$key] = $value['parameter'];
                            }
                            break;
                    }
                }
            }
        }
        
        // SET ALL PARAMAETERS
        $this->query->setParameters($parameters);
        
        // FILTER BRAND AND MARKETs
        $excludeFromFilter = ['PandoraBundle:Currencies'];
        if(isset($this->rawFieldArrayJoinery['BrandCode']) && isset($this->rawFieldArrayJoinery['CurrencyCode']) && !in_array('ROLE_ADMIN', $this->currentUser->getRoles()) && !in_array($this->targetEntity, $excludeFromFilter)){
            $brandMarket = explode(',', $this->currentUser->getBrandMarkets());
            if(count($brandMarket) > 0){
                $orConditions = [];
                foreach($brandMarket as $key => $value){
                    $bm = explode('-', $value);
                    $orConditions[] = $this->rawFieldArrayJoinery['BrandCode']['joineryTerm']."='".$bm[0]."' AND ".$this->rawFieldArrayJoinery['CurrencyCode']['joineryTerm']."='".$bm[1]."'";
                }
                $orX = $this->query->expr()->orX();
                $orX->addMultiple($orConditions);
                $this->query->andWhere($orX);
            }
        }
    }
    
    
    /**
     * Orders fields came from graphQL for Query, part of QueryBuilding Process
     *
     * @return void
     */
    public function queryBuilderOrderBy(){
        if (isset($this->args['sort']) && count($this->args['sort']) > 0) {
            // PROCESS COLUMN TO ORDER
            if(isset($this->args['sort'][0])){
                foreach ($this->args['sort'] as $value){
                    $this->query->addOrderBy($this->useFieldAlias($this->rawFieldArrayJoinery[$value['field']]['joineryTerm']), $value['order']);
                }
            }else{
                $this->query->orderBy($this->useFieldAlias($this->rawFieldArrayJoinery[$this->args['sort']['field']]['joineryTerm']), (($this->args['sort']['order'] == '1') ? 'ASC' : 'DESC'));
            }
        }
    }
    
    /**
     * Orders fields came from graphQL for Query, part of QueryBuilding Process
     *
     * @return void
     */
    public function queryBuilderGroupBy(){
        if (isset($this->args['group']) && count($this->args['group']) > 0) {
            foreach($this->args['group'] as $value){
                $this->query->addGroupBy($this->useFieldAlias($this->rawFieldArrayJoinery[$value]['joineryTerm']));
            }
        }
    }
    
    /**
     * Get Total records count for a particular query, part of QueryBuilding Process
     *
     * @return void
     */
    public function getQueryTotalCount($targetEntity)
    {
        if(isset($this->args['export']) && $this->args['export']){
            $this->totalCount = 0;
            return $this->totalCount;
        }
        
        // DECPRACTED
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if (isset($this->args['paging'])) {
            $this->totalCount = $this->promoted_em->createQueryBuilder()->select('count(a.Id)')->from($targetEntity, 'a')->getQuery()->getSingleScalarResult();
        }
        
        return $this->totalCount;
    }
    
    /**
     * Formats results inline with graphQL requirement and well as computes total execution time of the request.
     *
     * @return void
     */
    public function preparePagingResult($queryResult, $count)
    {
        $this->timerEnd = microtime(true);
        
        $returnResult = [
            'pagingInfo' => [
                'offset' => $this->args['paging']['offset'],
                'limit' => $this->args['paging']['limit'],
                'totalCount' => (int) $count
            ],
            'items' => $queryResult,
            'timeExecution' => $this->timerEnd - $this->timerStart
        ];
        
        return $returnResult;
    }
    
    /**
     * Determine the proper SQL part for each field that is selected. Part of QueryBuilding Process.
     *
     * @return void
     */
    public function targetFieldsToMapped($typeFields = [])
    {
        $returnValues = [
            'a.Id'
        ];
        if (count($this->fieldArray) > 0) {
            $returnValues = [];
            foreach ($this->fieldArray as $value) {
                $returnValues[] = $typeFields[$value]['joineryTerm'];
            }
        }
        return $returnValues;
    }
    
    /**
     * Determines if current User has access to Module or a particular field.
     *
     * @return void
     */
    public function hasAccessToModule($module = '', $userRole = ''){
        // IF ADMIN OPEN THE FLOOD GATE M'THERF*CKER
        if($userRole == 'ROLE_ADMIN'){
            return true;
        }
        
        // HIDE SHOW EMIAL / MOBILE
        $query = $this->default_em->createQueryBuilder();
        $query->select('a');
        $query->from('AppBundle:UserAccess', 'a');
        $query->andWhere('a.Method = :Method');
        $query->andWhere($query->expr()->like('a.Roles', ':Role'));
        $query->setParameters([
            'Method' => $module,
            'Role' => '%'.$userRole.'%'
        ]);
        $results = $query->getQuery()->setFirstResult(0)->setMaxResults(1)->getResult();
        
        if(count($results) > 0){
            $explodeRoles = explode(',', $results[0]->getRoles());
            if(in_array($userRole, $explodeRoles)){
                return true;
            }
            return false;
        }else{
            return false;
        }
        return false;
    }
    
    /**
     * This method uses the queryBuilder and extends it to fit the requirements of Charting queries.
     *
     * @return mixed
     */
    public function getChartDataQuery(){
        // PREPARE QUERY OBJECT
        $this->query = $this->promoted_em->createQueryBuilder();
        
        switch ($this->args['y_axis_type']) {
            case 'SINGLE':
                // SELECT
                $this->query->addSelect($this->args['formula_computation'].'('.$this->rawFieldArrayJoinery[$this->args['formula_field']]['joineryTerm'].') AS '.$this->args['formula_field']);
                $this->query->addSelect($this->chartView($this->args['chart_view'], $this->rawFieldArrayJoinery[$this->args['x_axis']]['joineryTerm'], $this->args['x_axis']));
                
                // GROUP AND ORDER BY
                $this->query->groupBy($this->args['x_axis']);
                $this->query->addOrderBy($this->args['x_axis'], 'ASC');
                
                break;
            case 'MULTI':
                // SELECT
                $this->query->addSelect($this->args['formula_computation'].'('.$this->rawFieldArrayJoinery[$this->args['formula_field']]['joineryTerm'].') AS '.$this->args['formula_field']);
                $this->query->addSelect($this->chartView($this->args['chart_view'], $this->rawFieldArrayJoinery[$this->args['x_axis']]['joineryTerm'], $this->args['x_axis']));
                $this->query->addSelect($this->rawFieldArrayJoinery[$this->args['y_axis']]['joineryTerm'].' AS '.$this->args['y_axis']);
                
                // GROUP AND ORDER BY
                $this->query->groupBy($this->args['x_axis'].', '.$this->args['y_axis']);
                $this->query->addOrderBy($this->args['x_axis'], 'ASC');
                $this->query->addOrderBy($this->args['y_axis'], 'ASC');
                
                break;
            default:
        };
        $this->queryBuilderSelectAndJoinReport();
        $this->queryBuilderWhereAndParameters();
        
        $results = [];
        $results['datasets'] = $this->query->getQuery()->getResult();
        $results['labels'] = array_values(array_unique(array_column($results['datasets'], $this->args['y_axis'])));
        
        return $results;
    }
    
    /**
     * @deprecated
     * Use getChartDataQuery() instead.
     * This method uses the queryBuilder and extends it to fit the requirements of Charting queries.
     *
     * @return mixed
     */
    public function getChartData(){
        // PREPARE QUERY OBJECT
        $this->query = $this->promoted_em->createQueryBuilder();
        
        switch ($this->args['y_axis_type']) {
            case 'SINGLE':
                // SELECT
                $this->query->addSelect($this->args['formula_computation'].'(a.'.$this->args['formula_field'].') AS '.$this->args['y_axis']);
                $this->query->addSelect($this->chartView($this->args['chart_view'], $this->rawFieldArrayJoinery[$this->args['x_axis']]['joineryTerm'], $this->args['x_axis']));
                
                // GROUP AND ORDER BY
                $this->query->groupBy($this->args['x_axis']);
                $this->query->addOrderBy($this->args['x_axis'], 'ASC');
                
                break;
            case 'MULTI':
                // SELECT
                $this->query->addSelect($this->args['formula_computation'].'(a.'.$this->args['formula_field'].') AS '.$this->args['formula_field']);
                $this->query->addSelect($this->chartView($this->args['chart_view'], $this->rawFieldArrayJoinery[$this->args['x_axis']]['joineryTerm'], $this->args['x_axis']));
                $this->query->addSelect('a.'.$this->args['y_axis'].' AS '.$this->args['y_axis']);
                
                // GROUP AND ORDER BY
                $this->query->groupBy($this->args['x_axis'].', '.$this->args['y_axis']);
                $this->query->addOrderBy($this->args['x_axis'], 'ASC');
                $this->query->addOrderBy($this->args['y_axis'], 'ASC');
                
                break;
            default:
                
        };
        $this->query->from($this->targetEntity, 'a');
        
        // WHERE CLAUSE
        $this->query->andWhere('a.'.$this->args['filter_date'].' BETWEEN :start AND :end');
        $this->query->setParameter('start', $this->args['start_date']->format('Y-m-d 00:00:00'));
        $this->query->setParameter('end', $this->args['end_date']->format('Y-m-d 23:59:59'));
        if(isset($this->args['y_axis_filter']) && $this->args['y_axis_filter'] != ''){
            $this->query->andWhere('a.'.$this->args['y_axis'].' IN(:yaxis)');
            $this->query->setParameter('yaxis', explode(',', $this->args['y_axis_filter']));
        }
        $this->query->setMaxResults(100);
        
        $results = $this->query->getQuery()->getResult();
        
        return $results;
    }
    
    /**
     * Masks a particular string, particularly used when displaying the email and phone number of Player Profile, but can also be used to other means.
     *
     * @return mixed
     */
    public function maskField($fieldValue = ''){
        return (!empty($fieldValue) && strlen($fieldValue) > 3) ? substr($fieldValue, 0, 1).str_repeat('*', strlen($fieldValue) - 2).substr($fieldValue, strlen($fieldValue) - 1, 1) : $fieldValue;
    }
    
    public function getQueryBuilderTabularResult(){
        $this->queryBuilderSelectAndJoin();
        $result = $this->resolveObjectFields($this->query->getQuery()->getResult());
        $sumData = $this->getQueryBuilderFieldSummation();
        
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if(isset($this->args['count']) && $this->args['count']){
            $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        return [
            'items' => $result,
            'pagingInfo' => [
                'sums' => $sumData,
                'offset' => $this->args['paging']['offset'],
                'limit' => $this->args['paging']['limit'],
                'totalCount' => (int) $this->totalCount
            ]
        ];
    }
    
    public function getQueryBuilderFieldSummation(){
        // PROCESS SUMMATION
        if(isset($this->args['sum']) && count($this->args['sum']) > 0){
            $selectFields = [];
            foreach ($this->args['sum'] as $value){
                $selectFields[] = 'SUM('.$this->rawFieldArrayJoinery[$value]['joineryTerm'].') AS '.$value;
            }
            $this->query->select($selectFields)->setFirstResult(0)->setMaxResults(1);
            return $this->query->getQuery()->getResult();
        }
        return [];
    }
    
    private function getParsableFields(){
        $parsableFields = [];
        foreach ($this->info as $value){
            if(strtolower($this->rawFieldArrayJoinery[$value]['type']->getName()) == TypeMap::TYPE_DATETIME || $this->rawFieldArrayJoinery[$value]['type']->getKind() == TypeMap::KIND_ENUM){
                $parsableFields[$value] = $this->rawFieldArrayJoinery[$value]['type'];
            }
        }
        return $parsableFields;
    }
    
    private function resolveObjectFields($rawDatas = []){
        $parsedData = [];
        $parsableFields = $this->getParsableFields();
        
        if(count($parsableFields) == 0 || count($rawDatas) == 0){
            return $rawDatas;
        }
        
        foreach ($rawDatas as $key => $dataValue){
            $toReplace = $dataValue;
            foreach($parsableFields as $key => $fieldValue){
                $toReplace[$key] = $fieldValue->serialize($toReplace[$key]);
            }
            $parsedData[] = $toReplace;
        }
        return  $parsedData;
    }
    
    private function chartView($charView = '', $field = '', $alias = ''){
        switch ($charView) {
            case 'MONTH_DAY':
                return "DateFormat(".$field.", '%m-%d') AS ".$alias;
                break;
            case 'YEAR_MONTH':
                return "DateFormat(".$field.", '%Y-%m') AS ".$alias;
                break;
            default:
                return $charView.'('.$field.') AS '.$alias;
                break;
        }
    }
    
    /**
     * Determines proper Alias for Selects
     *
     * @return mixed
     */
    private function useFieldAlias($stringVal = ''){
        $finalAlias = $stringVal;
        if(strpos($stringVal, ' AS ') !== false){
            $explodedString = explode(' AS ', $stringVal);
            $finalAlias = $explodedString[0];
        }
        
        return $finalAlias;
    }
    
    public function getFieldArray(){
        return $this->fieldArray;
    }
    
    protected function createNotFoundException($message = 'Entity not found')
    {
        return new \Exception($message, 404);
    }

    protected function createInvalidParamsException($message = 'Invalid params')
    {
        return new \Exception($message, 400);
    }

    protected function createAccessDeniedException($message = 'No access to this action')
    {
        return new \Exception($message, 403);
    }

}