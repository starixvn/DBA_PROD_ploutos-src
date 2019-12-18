<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\AffiliateTrackingLinkJoinery;
use PandoraBundle\Entity\Affiliates;
use PandoraBundle\Entity\Affiliatetrackinglinks;
use PandoraBundle\Entity\Languages;

class AffiliateTrackingLinkResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Affiliatetrackinglinks';
        $this->rawFieldArrayJoinery = AffiliateTrackingLinkJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        // OVERRIDE VALUE OF AFFILAITE_TRACKING_LINK_CODE
        $trackingLinkValue = $this->entity->getWebsiteUrl().'/';
        if(isset($this->args['entity']['LanguageId'])){
            $langEnity = $this->pandora_em->getRepository(Languages::class)->find($this->args['entity']['LanguageId']);
            $trackingLinkValue = $trackingLinkValue.$langEnity->getLanguageCode();
            $this->entity->setLanguage($langEnity);
        }
        if(isset($this->args['entity']['AffiliateId'])){
            $affEnity = $this->pandora_em->getRepository(Affiliates::class)->find($this->args['entity']['AffiliateId']);
            $trackingLinkValue = strtolower($trackingLinkValue).'?afcode='.$affEnity->getAffiliateCode();
            $this->entity->setAffiliate($affEnity);
        }
        $this->entity->setAffiliateTrackingLinkCode($trackingLinkValue);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Affiliate', 'b');
        }
        if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.Language', 'c');
        }
    }
    
    public function hasDuplicate(){
        $affilaiteTracking = $this->pandora_em->getRepository(Affiliatetrackinglinks::class)->findBy([
            'AffiliateId'=> $this->args['entity']['AffiliateId'],
            'LanguageId' => $this->args['entity']['LanguageId']
        ]);
        return (count($affilaiteTracking) > 0) ? true : false;
    }
    
    
//     public function getQueryBuilderPagingResult()
//     {
//         $this->queryBuilderSelectAndJoin();
//         $results = $this->query->getQuery()->getResult();
//         // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
//         if(isset($this->args['count']) && $this->args['count']){
//             $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
//         }
//         return $this->preparePagingResult($results, $this->totalCount);
//     }
    
//     public function getQueryBuilderSingleResult()
//     {
//         $this->queryBuilderSelectAndJoin();
//         if(isset($this->args['Id'])){
//             $this->query->where('a.Id = :Id');
//             $this->query->setParameter('Id', $this->args['Id']);
//         }
//         return $this->query->getQuery()->getResult();
//     }
}