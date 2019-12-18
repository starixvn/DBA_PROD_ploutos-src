<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\UserJoinery;
use PandoraBundle\Service\PandoraBackendService;
use PandoraBundle\Entity\Aspnetusers;
use PandoraBundle\Entity\Audittrail;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;

class UserResolver extends AbstractResolver
{
    protected $targetEntity = 'AppBundle:User';
    
    public function createNewUser(){
        /* VALIDATIONs */
        if (strlen($this->args['username']) < 8){
            throw new \Exception(json_encode([['field' => 'username', 'message' => 'Username must be equal or greater than 8 character.']]));
        }
        
        if(preg_match('/^[A-Za-z0-9_]{30,}$/', $this->args['username'])){
            throw new \Exception(json_encode([['field' => 'username', 'message' => 'Invalid Username format, must be Alpha-Numeric and not longer than 15 characters.']]));
        }
        
        if (!filter_var($this->args['email'], FILTER_VALIDATE_EMAIL)){
            throw new \Exception(json_encode([['field' => 'email', 'message' => 'Invalid Email format!']]));
        }
        
        if (strlen($this->args['default_password']) < 8) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must be equal or greater than 8 character.']]));
        }
        
        if (!preg_match("#[0-9]+#", $this->args['default_password'])) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must include at least one number.']]));
        }
        
        if (!preg_match("#[a-zA-Z]+#", $this->args['default_password'])) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must include at least one letter.']]));
        }
        
        
        if($this->userManager->findUserByUsername($this->args['username'])){
            throw new \Exception(json_encode([['field' => 'username', 'message' => 'Username already exist.']]));
            return false;
        }
        
        if($this->userManager->findUserByEmail($this->args['email'])){
            throw new \Exception(json_encode([['field' => 'email', 'message' => 'Email already exist.']]));
            return false;
        }
        
        try{
            // CREATE A USER ON ASP. NET
            $aspUserEquivalent = $this->registerToASPBackend($this->args['username']);
            if(!$aspUserEquivalent->Status){
                throw new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to create ASP Net User. Please contact administrator.']]));
            }
            
            $user = $this->userManager->createUser();
            $user->setUsername($this->args['username']);
            $user->setUsernameCanonical($this->args['username']);
            $user->setEmail($this->args['email']);
            $user->setEmailCanonical($this->args['email']);
            $user->setEnabled((bool)$this->args['email']);
            $user->setPlainPassword($this->args['default_password']);
            $user->addRole($this->args['roles']);
            $this->userManager->updateUser($user);
            
            $data = $this->default_em->getReference('AppBundle\Entity\User', $user->getId());
            $data->setAspNetUserId($aspUserEquivalent->Data->UserId);
            $data->setBrandMarkets($this->args['BrandMarkets']);
            $data->setLastName($this->args['LastName']);
            $data->setFirstName($this->args['FirstName']);
            $data->setBirthDate($this->args['BirthDate']);
            $data->setGender($this->args['Gender']);
            $data->setStreet1($this->args['Street1']);
            $data->setStreet2($this->args['Street2']);
            $data->setCityCode($this->args['CityCode']);
            $data->setRegionCode($this->args['RegionCode']);
            $data->setStateProvinceCode($this->args['StateProvinceCode']);
            $data->setZip($this->args['Zip']);
            
            // MANAGE TEAM
            if((int) $this->args['TeamId'] > 0){
                $teamData = $this->pandora_em->getReference('PandoraBundle\Entity\Teams', $this->args['TeamId']);
                $data->setTeamId($this->args['TeamId']);
                $data->setTeamName($teamData->getTeamName());
            }
            
            $this->default_em->merge($data);
            $this->default_em->flush();
            return true;
        }catch(\Exception $err){
            throw new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']]));
            return false;
        }
    }
    
    public function updateUser(){
        /* VALIDATIONs */
        if (strlen($this->args['username']) < 8){
            throw new \Exception(json_encode([['field' => 'username', 'message' => 'Username must be equal or greater than 8 character.']]));
        }
        
        if(preg_match('/^[A-Za-z0-9_]{30,}$/', $this->args['username'])){
            throw new \Exception(json_encode([['field' => 'username', 'message' => 'Invalid Username format, must be Alpha-Numeric and not longer than 15 characters.']]));
        }
        
        if (!filter_var($this->args['email'], FILTER_VALIDATE_EMAIL)){
            throw new \Exception(json_encode([['field' => 'email', 'message' => 'Invalid Email format!']]));
        }
        
        if (!empty($this->args['default_password']) && strlen($this->args['default_password']) < 8) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must be equal or greater than 8 character.']]));
        }
        
        if (!empty($this->args['default_password']) && !preg_match("#[0-9]+#", $this->args['default_password'])) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must include at least one number.']]));
        }
        
        if (!empty($this->args['default_password']) && !preg_match("#[a-zA-Z]+#", $this->args['default_password'])) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must include at least one letter.']]));
        }
        
        try{
            // UPDATE SENSITIVE INFORMATION ONLY WHEN THE UPDATOR IS ALLOWED
            $userEdit = $this->userManager->findUserBy(['id' => $this->args['id']]);
            if(!$userEdit){
                throw new \Exception(json_encode([['field' => 'username', 'message' => 'User not found.']]));
                return false;
            }
            
            // ENSURE THAT ASPNETUSERID ALWAYS HAS VALUE AND THAT IT DOES NOT CHANGE
            // CREATE A USER ON ASP. NET
            if(!$userEdit->getAspNetUserId() || !$this->pandora_em->getRepository(Aspnetusers::class)->find($userEdit->getAspNetUserId())){
                $aspUserEquivalent = $this->registerToASPBackend($userEdit->getUsername());
                if(!$aspUserEquivalent->Status){
                    throw new \Exception(json_encode([['field' => 'username', 'message' => 'Unable to create ASP Net User. Please contact administrator.']]));
                    return false;
                }
                $userEdit->setAspNetUserId($aspUserEquivalent->Data->UserId);
            }
            
            // ROLE CHANGE AND ENABLE DISABLE ONLY ADMINs CAN DO THIS
            if(in_array('ROLE_ADMIN', $this->currentUser->getroles()) || in_array('ROLE_SUPER_ADMIN', $this->currentUser->getroles())){
                // ENABLE DISABLE ACCOUNT
                if($userEdit->isEnabled() != (bool)$this->args['enabled']){
                    $userEdit->setEnabled((bool)$this->args['enabled']);
                }
                
                // ROLE
                $toRemoveRoles = $userEdit->getRoles();
                foreach ($toRemoveRoles as $value){
                    $userEdit->removeRole($value);
                }
                $userEdit->addRole($this->args['roles']);
                
                // MANAGE TEAM
                if((int) $this->args['TeamId'] > 0){
                    $teamData = $this->pandora_em->getReference('PandoraBundle\Entity\Teams', $this->args['TeamId']);
                    $userEdit->setTeamId($this->args['TeamId']);
                    $userEdit->setTeamName($teamData->getTeamName());
                }
                
                // BRAND MARKETS
                if($userEdit->getBrandMarkets() != $this->args['BrandMarkets']){
                    $userEdit->setBrandMarkets($this->args['BrandMarkets']);
                }
            }
            
            // ALLOW EDIT TO OWNER OR ROLE_ADMIN ONLY
            if($userEdit->getUsername() == $this->currentUser->getusername() || in_array('ROLE_ADMIN', $this->currentUser->getroles()) || in_array('ROLE_SUPER_ADMIN', $this->currentUser->getroles())){
                
                // IF USERNAME IS ATTEMPTING TO CHANGE CHECK IF EXISTING
                if($userEdit->getUsername() != $this->args['username']){
                    $existingUsername = $this->userManager->findUserByUsername($this->args['username']);
                    if($existingUsername){
                        if($existingUsername->getId() == $userEdit->getId()){
                            throw new \Exception(json_encode([['field' => 'username', 'message' => 'Username already exist.']]));
                            return false;
                        }
                    }
                    $userEdit->setUsername($this->args['username']);
                    $userEdit->setUsernameCanonical($this->args['username']);
                }
                
                // IF EMAIL IS ATTEMPTING TO CHANGE CHECK IF EXISTING
                if($userEdit->getEmail() != $this->args['email']){
                    $existingEmail = $this->userManager->findUserByEmail($this->args['email']);
                    if($existingEmail){
                        if($existingEmail->getId() == $userEdit->getId()){
                            throw new \Exception(json_encode([['field' => 'email', 'message' => 'Email already exist.']]));
                            return false;
                        }
                    }
                    $userEdit->setEmail($this->args['username']);
                    $userEdit->setEmailCanonical($this->args['username']);
                }
                
                // CHANGE PASSWORD
                if(isset($this->args['default_password']) && $this->args['default_password'] != ''){
                    $userEdit->setPlainPassword($this->args['default_password']);
                }
            }
            
            $userEdit->setLastName($this->args['LastName']);
            $userEdit->setFirstName($this->args['FirstName']);
            $userEdit->setBirthDate($this->args['BirthDate']);
            $userEdit->setGender($this->args['Gender']);
            $userEdit->setStreet1($this->args['Street1']);
            $userEdit->setStreet2($this->args['Street2']);
            $userEdit->setCityCode($this->args['CityCode']);
            $userEdit->setRegionCode($this->args['RegionCode']);
            $userEdit->setStateProvinceCode($this->args['StateProvinceCode']);
            $userEdit->setZip($this->args['Zip']);
            
            $beforeUpdate = $this->getUserObjectAsArray($this->args['id']);
            $this->userManager->updateUser($userEdit);
            $afterUpdate = $this->getUserObjectAsArray($this->args['id']);
            
            $this->determineUserChangesAndSave($beforeUpdate, $afterUpdate);
            return true;
        }catch(\Exception $err){
            throw new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']]));
            return false;
        }
    }
    
    public function updatePersonalUserInfo(){
        if (!empty($this->args['default_password']) && strlen($this->args['default_password']) < 8) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must be equal or greater than 8 character.']]));
        }
        
        if (!empty($this->args['default_password']) && !preg_match("#[0-9]+#", $this->args['default_password'])) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must include at least one number.']]));
        }
        
        if (!empty($this->args['default_password']) && !preg_match("#[a-zA-Z]+#", $this->args['default_password'])) {
            throw new \Exception(json_encode([['field' => 'default_password', 'message' => 'Password must include at least one letter.']]));
        }
        
        try{
            // UPDATE SENSITIVE INFORMATION ONLY WHEN THE UPDATOR IS ALLOWED
            $userEdit = $this->userManager->findUserBy(['username' => $this->currentUser->getusername()]);
            if(!$userEdit){
                throw new \Exception(json_encode([['field' => 'username', 'message' => 'User not found.']]));
                return false;
            }
            
            // ALLOW EDIT TO OWNER OR ROLE_ADMIN ONLY
            if($userEdit->getUsername() == $this->currentUser->getusername() || in_array('ROLE_ADMIN', $this->currentUser->getroles()) || in_array('ROLE_SUPER_ADMIN', $this->currentUser->getroles())){
                // CHANGE PASSWORD
                if(isset($this->args['default_password']) && $this->args['default_password'] != ''){
                    $userEdit->setPlainPassword($this->args['default_password']);
                }
            }
            
            $userEdit->setLastName($this->args['LastName']);
            $userEdit->setFirstName($this->args['FirstName']);
            $userEdit->setBirthDate($this->args['BirthDate']);
            $userEdit->setGender($this->args['Gender']);
            $userEdit->setStreet1($this->args['Street1']);
            $userEdit->setStreet2($this->args['Street2']);
            $userEdit->setCityCode($this->args['CityCode']);
            $userEdit->setRegionCode($this->args['RegionCode']);
            $userEdit->setStateProvinceCode($this->args['StateProvinceCode']);
            $userEdit->setZip($this->args['Zip']);
            
            $beforeUpdate = $this->getUserObjectAsArray($this->args['id']);
            $this->userManager->updateUser($userEdit);
            $afterUpdate = $this->getUserObjectAsArray($this->args['id']);
            
            $this->determineUserChangesAndSave($beforeUpdate, $afterUpdate);
            return true;
        }catch(\Exception $err){
            throw new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']]));
            return false;
        }
    }
    
    private function registerToASPBackend(string $UserName = ''){
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('User/Create', 'POST', [
            'UserName' => $UserName,
            'Password' => 'TryM0t0h3h3'
        ]);
        return $pandoraApi->executeQuery();
    }
    
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = UserJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
        
        // OVERRIDE ENTITY DEFAULT
        $this->promoted_em = $this->default_em;
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
    }
    
    public function getQueryBuilderPagingResult()
    {
        $this->queryBuilderSelectAndJoin();
        $results = $this->query->getQuery()->getResult();
        
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if(isset($this->args['count']) && $this->args['count']){
            $this->totalCount = $this->query->select('count(a.id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        if(isset($this->args['username'])){
            $this->query->where('a.username = :username');
            $this->query->setParameter('username', $this->args['username']);
        }
        return $this->query->getQuery()->getResult();
    }
    
    public function getQueryBuilderSingleResultPersonalUser()
    {
        $this->queryBuilderSelectAndJoin();
        $this->query->where('a.username = :username');
        $this->query->setParameter('username', $this->currentUser->getusername());
        return $this->query->getQuery()->getResult();
    }
    
    public function getUserNameByUniqueId(string $Id = '', $default = ''){
        $UserName = $this->default_em->createQueryBuilder()
        ->select('a.username')
        ->from($this->targetEntity, 'a')
        ->where('a.AspNetUserId = :AspNetUserId')
        ->setParameter(':AspNetUserId', $Id)
        ->setMaxResults(1)
        ->getQuery()
        ->getOneOrNullResult();
        
        return ($UserName) ? $UserName['username'] : $default;
    }
    
    public function getUserObjectAsArray(string $Id = ''){
        return $this->default_em->createQueryBuilder()
        ->select('a')
        ->from($this->targetEntity, 'a')
        ->where('a.id = :id')
        ->setParameter(':id', $Id)
        ->setMaxResults(1)
        ->getQuery()
        ->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
    
    private function determineUserChangesAndSave($beforeUpdate, $afterUpdate){
        $auditDescription = [
            'obj' => 'User',
            'objId' => $beforeUpdate['id'],
            'mode' => 'edit',
            'items' => [],
        ];
        
        if($beforeUpdate['username'] != $afterUpdate['username']){
            $auditDescription['items'][] = [
                'fld' => 'username',
                'ov' => $beforeUpdate['username'],
                'nv' => $afterUpdate['username']
            ];
        }
        if($beforeUpdate['email'] != $afterUpdate['email']){
            $auditDescription['items'][] = [
                'fld' => 'email',
                'ov' => $beforeUpdate['email'],
                'nv' => $afterUpdate['email']
            ];
        }
        if($beforeUpdate['enabled'] != $afterUpdate['enabled']){
            $auditDescription['items'][] = [
                'fld' => 'status',
                'ov' => $beforeUpdate['enabled'],
                'nv' => $afterUpdate['enabled']
            ];
        }
        if($beforeUpdate['LastName'] != $afterUpdate['LastName']){
            $auditDescription['items'][] = [
                'fld' => 'LastName',
                'ov' => $beforeUpdate['LastName'],
                'nv' => $afterUpdate['LastName']
            ];
        }
        if($beforeUpdate['BrandMarkets'] != $afterUpdate['BrandMarkets']){
            $auditDescription['items'][] = [
                'fld' => 'BrandMarkets',
                'ov' => $beforeUpdate['BrandMarkets'],
                'nv' => $afterUpdate['BrandMarkets']
            ];
        }
        if($beforeUpdate['FirstName'] != $afterUpdate['FirstName']){
            $auditDescription['items'][] = [
                'fld' => 'FirstName',
                'ov' => $beforeUpdate['FirstName'],
                'nv' => $afterUpdate['FirstName']
            ];
        }
        if($beforeUpdate['TeamName'] != $afterUpdate['TeamName']){
            $auditDescription['items'][] = [
                'fld' => 'TeamName',
                'ov' => $beforeUpdate['TeamName'],
                'nv' => $afterUpdate['TeamName']
            ];
        }
        
        if(count($auditDescription['items']) > 0){
            $systeModuleIds = new SystemModulesIntTypeEnum();
            $sourceObject = $systeModuleIds->parseValue('User');
            
            $audit = new Audittrail();
            $audit->setSourceObject($sourceObject ? $sourceObject : 1000); // 1000 MEANs NOT EXISTENT IN SystemModulesIntTypeEnum()
            $audit->setSourceObjectId($beforeUpdate['id']);
            $audit->setAuditDescription(json_encode($auditDescription));
            
            // SYSTEM INFO
            $currentAspNetId = $this->currentUser->getAspNetUserId();
            $audit->setCreatedById($currentAspNetId);
            $audit->setModifiedById($currentAspNetId);
            $audit->setRevisionBy($this->currentUser->getUsername());
            $audit->setDateCreated(new \DateTime('NOW'));
            $audit->setDateModified(new \DateTime('NOW'));
            
            $this->pandora_em->merge($audit);
            $this->pandora_em->flush();
        }

    }
    
}