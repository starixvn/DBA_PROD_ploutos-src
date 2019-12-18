<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use PandoraBundle\Service\SystemVariableService;
use PandoraBundle\Resolver\WalletWithdrawalResolver;

class WithdrawalNewCronCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('cronjob:withdrawal-new-extract-from-pandora-db')
        ->setHelp('Extract new withdrawal from Pandora.')
        ->setDescription('New Withdrawal will be extracted from Pandora and saved to localdatase and to be disseminated to subcribed users.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Starting Withdrawal Extract...',
            '===========================',
        ]);
        
        $systemVariable = $this->getContainer()->get(SystemVariableService::class);
        $withdrawalResolver = $this->getContainer()->get(WalletWithdrawalResolver::class);
        $lastWithdrawalId = $systemVariable->get('WITHDRAWAL_NOTIF_LAST_ID', 0);
        
        // INITIALIZATION OF VARIABLE
        if(!$lastWithdrawalId){
            $lastWithdrawalId = $withdrawalResolver->getWithdrawalLastId();
            $systemVariable->set('WITHDRAWAL_NOTIF_LAST_ID', $lastWithdrawalId);
        }
        $newWithdrawals = $withdrawalResolver->getNewlyWithdrawal($lastWithdrawalId);
        
        // UPDATE LAST FETCHED DEPOSIT ID
        if(count($newWithdrawals) > 0){
            $systemVariable->set('WITHDRAWAL_NOTIF_LAST_ID', $newWithdrawals[count($newWithdrawals)-1]['Id']);
        }
        
        $output->writeln([count($newWithdrawals)]);
        
//         if(count($newWithdrawals) > 0){
//             $entryData = [
//                 'cat'     => 'new_withdrawals',
//                 'data'   => $newWithdrawals,
//             ];
            
//             $context = new \ZMQContext();
//             $container = $this->getContainer();
//             $socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'notification_pusher'); // changed from 'my pusher'
//             $socket->connect('tcp://'.$container->getParameter('tcp_host').':'.$container->getParameter('tcp_port'));
//             $socket->send(json_encode($entryData));
//         }
    }
}