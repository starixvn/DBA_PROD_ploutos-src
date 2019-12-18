<?php
namespace PandoraBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class FileManageService
{
    public $blob;
    public $fileName;
    public $fileActualBase64;
    public $fileSize;
    public $fileExtension;
    public $fileMime;
    
    public $systemFileName;
    public $systemFileLocation;
    
    private $container;
    private $fileSizeLimit;
    private $allowedFileExtensions;
    private $fileUploadLocation;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->fileSizeLimit = $this->container->getParameter('file_upload_size');
        $this->allowedFileExtensions = $this->container->getParameter('file_upload_valid_extensions');
        $this->fileUploadLocation = $this->container->getParameter('file_upload_location');
    }
    
    public function init($blob = '', $fileName = '', $fileSize = 0){
        try{
            $this->blob = $blob;
            $this->fileName = $fileName;
            $this->fileSize = $fileSize;
            
            // GET EXTENSION
            $fileNameExplode = explode('.', $fileName);
            $this->fileExtension = $fileNameExplode[count($fileNameExplode) - 1];
            
            // GET BASE64 AND MIME
            $imageParts = explode(';base64,', $blob);
            $this->fileActualBase64 = base64_decode($imageParts[1]);
            $this->fileMime = str_replace('data:', '', $imageParts[0]);
        }catch(Exception $e){
            throw new \Exception('Unable to process you request. Please contact Administrator.');
        }
    }
    
    public function validate(){
        $stringSize = (int) (strlen(rtrim($this->blob, '=')) * 3 / 4);
        if($this->fileSize > $this->fileSizeLimit){
            throw new \Exception('File size too big.');
        }
        
        if($stringSize > $this->fileSizeLimit){
            throw new \Exception('File size too big.');
        }
        
        if(!in_array(strtolower($this->fileExtension), $this->allowedFileExtensions)){
            throw new \Exception('Unable to process you request. Please contact Administrator.');
        }
    }
    
    public function blobToPhysicalFile(){
        try {
            // $fileSystem->chown($targetDirectory.'/'.$fileName, 'www-data');
            $fileSystem = new Filesystem();
            $this->systemFileName = str_replace('.', '', microtime(true)).'.'.$this->fileExtension;
            
            $this->systemFileLocation = date('Y-m');
            $targetDirectory = $this->container->get('kernel')->getRootDir().'/..'.$this->fileUploadLocation.$this->systemFileLocation;
            if(!$fileSystem->exists($targetDirectory)){
                $fileSystem->mkdir($targetDirectory);
            }
            $fileSystem->touch($targetDirectory.'/'.$this->systemFileName);
            file_put_contents($targetDirectory.'/'.$this->systemFileName, $this->fileActualBase64);
            return true;
        } catch (IOExceptionInterface $e) {
            throw new \Exception('Unable to process you request. Please contact Administrator. '.$e);
        }
    }
    
    public function unlinkFile($fileLocation = ''){
        $fileSystem = new Filesystem();
        $exactFileLocation = $this->container->get('kernel')->getRootDir().'/..'.$this->fileUploadLocation.$this->systemFileLocation.$fileLocation;
        if(!$fileSystem->exists($exactFileLocation)){
            return true;
        }
        
        try{
            $fileSystem->remove($exactFileLocation);
            return true;
        }catch(IOExceptionInterface $e){
            return false;
        }
    }
}