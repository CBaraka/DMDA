<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public const ADMIN_USER_REFERENCE = 'admin-user';
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@test.fr');
        $user->setPassword('test');
        $user->setRoles(['ROLE_ADMIN']);
        $password = $this->encoder->encodePassword($user, 'test');

        $manager->persist($user);
        $manager->flush();

        $this->addReference(self::ADMIN_USER_REFERENCE, $user);
    }
}
