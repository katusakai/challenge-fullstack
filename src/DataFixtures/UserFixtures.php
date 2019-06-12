<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++){
            $user = new User();
            $user
                ->setUsername('username' . $i)
                ->setFirstName('Firstname' . $i)
                ->setLastName('Lastname' .$i)
                ->setEmail('email' . $i . '@email.lt')
                ->setCreatedAt(new \DateTime())
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user,
                    'password'
                ));
            $manager->persist($user);

            $manager->flush();
        }
    }
}
