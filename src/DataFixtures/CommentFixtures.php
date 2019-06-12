<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Helpers\RandomUserId;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    private $randomUserId;

    /**
     * CommentFixtures constructor.
     * @param $randomUserId
     */
    public function __construct(RandomUserId $randomUserId)
    {
        $this->randomUserId = $randomUserId;
    }

    public function load(ObjectManager $manager)
    {
         $comment = new Comment();
         $comment
             ->setUserId($this->randomUserId->get())
             ->setText('grazus tekstas')
             ->setCreatedAt(new \DateTime())
             ;
         $manager->persist($comment);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}
