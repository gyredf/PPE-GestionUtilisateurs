<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setUsername('Turkovics');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$c254bjNQVkp6VnVKWFVsMQ$35rgShjG+zuZQtx2lAcCH5bBY2h/nXVD4ERmj74Ff8s');
        // $product = new Product();
        $manager->persist($user);


        $user = new User();

        $user->setUsername('User');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$c254bjNQVkp6VnVKWFVsMQ$35rgShjG+zuZQtx2lAcCH5bBY2h/nXVD4ERmj74Ff8s');
         // $product = new Product();
        $manager->persist($user);

        $manager->flush();
    }
}