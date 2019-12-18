<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class RegisterFirstUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('init:introduce-first-man')
        ->setHelp('Run this command to register the First All-Power User.')
        ->setDescription('');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Introducing first Man in Ploutus...',
            '===================================',
        ]);
        
        // CREDENTIAL OF THE FIRST PERSON
        $email = 'admin@citronsolutions.com';
        $username = 'admin';
        $password = '@d@m@nd3vE';
        
        $registrationBooth = $this->getContainer()->get('fos_user.user_manager');
        $email_exist = $registrationBooth->findUserByEmail($email);
        if($email_exist){
            $output->writeln('Email already exist...');
        }else{
            $user = $registrationBooth->createUser();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setEmailCanonical($email);
            $user->setEnabled(1);
            $user->setPlainPassword($password);
            $user->setRoles(['ROLE_ADMIN']);
            $registrationBooth->updateUser($user);
        }
    }
}