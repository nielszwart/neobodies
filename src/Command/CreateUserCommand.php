<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    protected $encoder;
    protected $manager;

    public function __construct(UserPasswordEncoderInterface $encoder, ObjectManager $manager)
    {
        $this->encoder = $encoder;
        $this->manager = $manager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:add-admin')->setDescription('Adds admin user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('Adding admin... ');
        $user = new User();
        $user->setUsername('info@neobodies.nl');
        $user->setEmail('info@neobodies.nl');

        $password = $this->encoder->encodePassword($user, 'test1234');
        $user->setPassword($password);

        $this->manager->persist($user);
        $this->manager->flush();

        $output->writeln('Done!');
    }
}
