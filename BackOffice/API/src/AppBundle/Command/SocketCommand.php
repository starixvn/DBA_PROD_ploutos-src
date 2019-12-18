<?php
namespace AppBundle\Command;

// use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\Wamp\WampServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;
use React\Socket\Server;
// use React\ZMQ\Context;
use AppBundle\Sockets\Pusher;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class SocketCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('sockets:start-chat')
        ->setHelp("Starts the chat socket demo")
        ->setDescription('Starts the chat socket demo');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Starting WebSocket'
        ]);
        
//         $container = $this->getContainer();
//         $loop   = Factory::create();
//         $pusher = new Pusher();
        
//         // Listen for the web server to make a ZeroMQ push after an ajax request
//         $context = new Context($loop);
//         $pull = $context->getSocket(\ZMQ::SOCKET_PULL);
        
//         // Binding to 127.0.0.1 means the only client that can connect is itself
//         $pull->bind('tcp://'.$container->getParameter('tcp_host').':'.$container->getParameter('tcp_port'));
//         $pull->on('message', [$pusher, 'onPushNotify']);
        
//         // Set up our WebSocket server for clients wanting real-time updates
//         $webSock = new Server('0.0.0.0:'.$container->getParameter('webscoket_port'), $loop); // Binding to 0.0.0.0 means remotes can connect
//         $webServer = new IoServer(new HttpServer(new WsServer(new WampServer($pusher))), $webSock);
//         $loop->run();
    }
}