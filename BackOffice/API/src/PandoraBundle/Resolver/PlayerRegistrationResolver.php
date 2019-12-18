<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

class PlayerRegistrationResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:Playerregistrations';
    public function initEntityResolver(){
    }
    
    public function getQueryBuilderPagingResult()
    {
        $this->query->from($this->targetEntity, $this->prefix);
        $results = $this->query->getQuery()->getResult();
        return $this->preparePagingResult($results, $this->getQueryTotalCount($this->targetEntity));
    }
    
    public function updatePlayerType(int $playerProfileId, int $playerType){
        try{
            // HACKISH APPROACH SINCE DOCTRINE USES PROXY CLASSES WHEN IN LAZY MODE, THIS IN TURN UNABLE TO FUNCTION AUDIT PROPERLY
            $queryBuilder = $this->promoted_em->createQueryBuilder();
            $queryBuilder->select('a.PlayerRegistrationId')->from('PandoraBundle:Playerprofiles', 'a')->where('a.Id = :Id')->setParameter(':Id', $playerProfileId);
            $queryResult = $queryBuilder->getQuery()->getResult();
            
            if(count($queryResult) > 0 && isset($queryResult[0]['PlayerRegistrationId'])){
                $playerRegistration = $this->promoted_em->getRepository($this->targetEntity)->find($queryResult[0]['PlayerRegistrationId']);
                $playerRegistration->setPlayerType($playerType);
                
                // SET MODIFICATION INFORMATION
                $playerProfile = $this->promoted_em->getRepository('PandoraBundle:Playerprofiles')->find($playerProfileId);
                $playerRegistration->setModifiedById($this->currentUser->getAspNetUserId());
                $playerRegistration->setDateModified(new \DateTime('NOW'));
                $playerProfile->setModifiedById($this->currentUser->getAspNetUserId());
                $playerProfile->setDateModified(new \DateTime('NOW'));
                
                $this->promoted_em->merge($playerRegistration);
                $this->promoted_em->merge($playerProfile);
                $this->promoted_em->flush();
                
                return $playerProfile;
            }
            
            return $queryResult;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
    
    public function getEntity(string $UserName = ''){
        return $this->pandora_em->getRepository($this->targetEntity)->findOneBy(['UserName'=> $UserName]);
    }
    
    public function getRegistrationLastId(){
        $this->query = $this->pandora_em->createQueryBuilder();
        return $this->query->select('a.Id')->from($this->targetEntity, 'a')->orderBy('a.Id', 'DESC')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
    }
    
    public function getNewlyRegistrationViaProfile(int $Id = 0){
        $this->query = $this->pandora_em->createQueryBuilder();
        $this->query->select('a.Id, a.PlayerRegistrationId, a.UserName, a.Email, a.CurrencyCode, b.BrandCode');
        $this->query->from('PandoraBundle:Playerprofiles', 'a');
        $this->query->join('a.PlayerRegistration', 'b');
        $this->query->where('a.PlayerRegistrationId > :Id');
        $this->query->setParameter(':Id', $Id);
        return $this->query->setMaxResults(100)->getQuery()->getArrayResult();
    }
    
}