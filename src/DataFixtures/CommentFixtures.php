<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Helpers\RandomId;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    private $randomId;

    private $nestedCommentId;

    /**
     * CommentFixtures constructor.
     * @param $randomId
     */
    public function __construct(RandomId $randomId)
    {
        $this->randomId = $randomId;
    }

    public function load(ObjectManager $manager)
    {
        $this->mainComments($manager);
        $this->nestedComments($manager);
    }

    private function mainComments(ObjectManager $manager)
    {
        for ($i = 0; $i <20; $i++){
            $comment = new Comment();
            $comment
                ->setUserId($this->randomId->getUserId())
                ->setText('The content of main comment no ' . $i)
                ->setCreatedAt(new \DateTime())
            ;
            $manager->persist($comment);
            $manager->flush();

            $this->nestedCommentId[] = $comment->getId();
        }
    }

    private function nestedComments(ObjectManager $manager)
    {
        for ($i = 0; $i <20; $i++){
            $comment = new Comment();
            $comment
                ->setUserId($this->randomId->getUserId())
                ->setNestedCommentId($this->randomId->getCommentId())
                ->setText('The content of nested comment '. $comment->getNestedCommentId() .' no ' . $i)
                ->setCreatedAt(new \DateTime())
            ;
            $manager->persist($comment);
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}
