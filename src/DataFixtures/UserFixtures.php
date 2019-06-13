<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Helpers\RandomDate;
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
        $randomDates= new RandomDate();

        for ($i = 0; $i < 10; $i++){
            $createdDate = $randomDates->get(15);
            $user = new User();
            $user
                ->setUsername('username' . $i)
                ->setFirstName('Firstname' . $i)
                ->setLastName('Lastname' .$i)
                ->setEmail('email' . $i . '@email.lt')
                ->setCreatedAt($createdDate)
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user,
                    'password'
                ));
            $manager->persist($user);

            $manager->flush();
        }
    }
}
