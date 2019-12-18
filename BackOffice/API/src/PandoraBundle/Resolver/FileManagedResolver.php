<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\FileManagedJoinery;

class FileManagedResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:Filemanaged';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = FileManagedJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
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
            $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        if(isset($this->args['Id'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        return $this->query->getQuery()->getResult();
    }
    
    public function getFileIds($sourceObjectId = 0, $sourceObject = 0){
        $this->query = $this->promoted_em->createQueryBuilder();
        $this->query->select('a.Id');
        
        $this->query->where('a.SourceObject = :SourceObject');
        $this->query->andWhere('a.SourceObjectId = :SourceObjectId');
        $this->query->setParameter('SourceObject', $sourceObject);
        $this->query->setParameter('SourceObjectId', $sourceObjectId);
        
        $this->query->from($this->targetEntity, 'a');
        return $this->query->getQuery()->getResult();
    }
    
    public function getFileInfos($sourceObjectId = 0, $sourceObject = 0){
        $this->query = $this->promoted_em->createQueryBuilder();
        $this->query->select('a.Id, a.SourceObject, a.SourceObjectId, a.FileName, a.Uri, a.FileMime, a.FileSize');
        
        $this->query->where('a.SourceObject = :SourceObject');
        $this->query->andWhere('a.SourceObjectId = :SourceObjectId');
        $this->query->setParameter('SourceObject', $sourceObject);
        $this->query->setParameter('SourceObjectId', $sourceObjectId);
        
        $this->query->from($this->targetEntity, 'a');
        return $this->query->getQuery()->getResult();
    }
    
    public function updateFileRecordAttachment($fileIds = [], $sourceObjectId = 0, $sourceObject = 0){
        if(!empty($sourceObjectId) && is_int($sourceObject)){
            // REMOVED ALL ATTACHED FIRST
            $queryRemove = $this->promoted_em->createQuery('UPDATE PandoraBundle\Entity\Filemanaged f SET f.SourceObject = :SourceObject, f.SourceObjectId = :SourceObjectId WHERE f.SourceObject = :SourceObjectOld AND f.SourceObjectId = :SourceObjectIdOld')->setParameters([
                ':SourceObject' => null,
                ':SourceObjectId' => null,
                ':SourceObjectOld' => $sourceObject,
                ':SourceObjectIdOld' => $sourceObjectId
            ]);
            $queryRemove->execute();
            
            // RE-ATTACH IF THERE IS ANY
            if(count($fileIds) > 0){
                $queryUpdate= $this->promoted_em->createQuery('UPDATE PandoraBundle\Entity\Filemanaged f SET f.SourceObject = :SourceObject, f.SourceObjectId = :SourceObjectId WHERE f.Id IN (:Id)')->setParameters([
                    ':SourceObject' => $sourceObject,
                    ':SourceObjectId' => $sourceObjectId,
                    ':Id' => $fileIds
                ]);
                $queryUpdate->execute();
            }
        }
    }
    
    public function deleteFileRecord($fileId = 0){
        $fileEntity = $this->pandora_em->getRepository($this->targetEntity)->find($fileId);
        $this->pandora_em->remove($fileEntity);
        $this->pandora_em->flush();
    }
    
    public function getTemporaryFiles(){
        $query = $this->promoted_em->createQueryBuilder();
        return $query->select('a.Id, a.Uri')->from($this->targetEntity, 'a')
        ->where('a.SourceObject IS NULL')
        ->andWhere('a.SourceObjectId IS NULL')
        ->andWhere('a.DateModified <= :CurrentDate')
        ->setParameter(':CurrentDate', (new \DateTime())->modify('-4 hours'))
        ->setMaxResults(100)->getQuery()->getArrayResult();
    }
}