<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Entity\Brands;
use PandoraBundle\Joinery\TicketJoinery;
use PandoraBundle\Entity\Ticketcategory;
use PandoraBundle\Entity\Teams;
use PandoraBundle\Entity\Tickets;

class TicketsResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Tickets';
        $this->rawFieldArrayJoinery = TicketJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        $brandEnity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
        $ticketCategoryEntity = $this->pandora_em->getRepository(Ticketcategory::class)->find($this->args['entity']['TicketCategoryId']);
        $TeamEntity = $this->pandora_em->getRepository(Teams::class)->find($this->args['entity']['TeamId']);
        $this->entity->setBrand($brandEnity);
        $this->entity->setTicketCategory($ticketCategoryEntity);
        $this->entity->setTeam($TeamEntity);
    }
    
    public function generateTicketNo($Id = 0){
        $ticketEntity = $this->pandora_em->getRepository(Tickets::class)->findOneBy(['Id'=> $Id]);
        $ticketEntity->setTicketNo(date('Ymd').'-'.sprintf('%05d', (String)$Id));
        $this->pandora_em->persist($ticketEntity);
        $this->pandora_em->flush();
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Brand', 'b');
        }
        if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.TicketCategory', 'c');
        }
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('a.Team', 'd');
        }
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