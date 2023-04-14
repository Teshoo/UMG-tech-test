<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        /* User fixtures */

        $user = new User();        
        $password = $this->hasher->hashPassword($user, 'user');
        $user   ->setEmail('user@mail.com')
                ->setPassword($password);
        $manager->persist($user);

        $user = new User();
        $password = $this->hasher->hashPassword($user, 'admin');
        $user   ->setEmail('admin@mail.com')
                ->setPassword($password)
                ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $manager->flush();
    }
}
