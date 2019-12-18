<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use PandoraBundle\Service\SystemVariableService;
use PandoraBundle\Resolver\PlayerRegistrationResolver;

class RegistrationNewCronCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('cronjob:registration-new-extract-from-pandora-db')
        ->setHelp('Extract new Registration from Pandora.')
        ->setDescription('New Registration will be extracted from Pandora and saved to localdatase and to be disseminated to subcribed users.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Starting Registration Extract...',
            '===========================',
        ]);
        
        $systemVariable = $this->getContainer()->get(SystemVariableService::class);
        $registrationResolver = $this->getContainer()->get(PlayerRegistrationResolver::class);
        $lastRegistrationId = $systemVariable->get('REGISTRATION_NOTIF_LAST_ID', 0);
        
        // INITIALIZATION OF VARIABLE
        if(!$lastRegistrationId){
            $lastRegistrationId = $registrationResolver->getRegistrationLastId();
            $systemVariable->set('REGISTRATION_NOTIF_LAST_ID', $lastRegistrationId);
        }
        $newRegistration = $registrationResolver->getNewlyRegistrationViaProfile($lastRegistrationId);
        
        // UPDATE LAST FETCHED DEPOSIT ID
        if(count($newRegistration) > 0){
            $systemVariable->set('REGISTRATION_NOTIF_LAST_ID', $newRegistration[count($newRegistration)-1]['PlayerRegistrationId']);
        }
        
        $output->writeln([count($newRegistration)]);
        
//         if(count($newRegistration) > 0){
//             $entryData = [
//                 'cat'     => 'new_registrations',
//                 'data'   => $newRegistration,
//             ];
            
//             $context = new \ZMQContext();
//             $container = $this->getContainer();
//             $socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'notification_pusher'); // changed from 'my pusher'
//             $socket->connect('tcp://'.$container->getParameter('tcp_host').':'.$container->getParameter('tcp_port'));
//             $socket->send(json_encode($entryData));
//         }
    }
}