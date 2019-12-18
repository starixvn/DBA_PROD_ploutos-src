<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use PandoraBundle\Resolver\FileManagedResolver;
use PandoraBundle\Service\FileManageService;

class CleanFileManagedCronCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('cronjob:clean-file-managed-tables-and-files')
        ->setHelp('Remove Temporary Uploaded files.')
        ->setDescription('Files that has no SourceObject and SourceObjectId will be removed from database and physical file.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Starting File Clean-Up.....',
            '===========================',
        ]);
        
        try{
            $fileManageResolver = $this->getContainer()->get(FileManagedResolver::class);
            $fileManageService = $this->getContainer()->get(FileManageService::class);
            
            $fileManageResolver->initAbstractResolver([], []);
            $fileManageResolver->initEntityResolver();
            $candidateFileTobeRemoved = $fileManageResolver->getTemporaryFiles();
            
            if(count($candidateFileTobeRemoved) > 0){
                foreach ($candidateFileTobeRemoved as $file){
                    $output->writeln($file);
                    
                    try{
                        if($fileManageService->unlinkFile($file['Uri'])){
                            $fileManageResolver->deleteFileRecord($file['Id']);
                            $output->writeln('Removed...');
                        }else{
                            $output->writeln('Retained...');
                        }
                    }catch (\Exception $err){
                        $output->writeln(['Unable to remove file '.$file['Uri'].': '.$err]);
                    }
                }
            }
        }catch (\Exception $e){
        }
    }
}