<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


   
    public const ADMIN_USER_REFERENCE = 'user';

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setEmail('userdmdamayotte976@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user, 'USERdmda$mayotte976');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();
        
        $this->addReference(self::ADMIN_USER_REFERENCE, $user);
    }
}
