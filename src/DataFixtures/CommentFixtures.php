<?php

namespace App\DataFixtures;

use App\API\RandomJokesApi;
use App\Entity\Comment;
use App\Helpers\RandomDate;
use App\Helpers\RandomEdited;
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
        $randomDates= new RandomDate();
        $editedDates = new RandomEdited();

        for ($i = 0; $i <20; $i++){
            $createdDate = $randomDates->get(13);
            $editedDate = $editedDates->edited(5);
            $comment = new Comment();
            $comment
                ->setUserId($this->randomId->getUserId())
                ->setText(RandomJokesApi::get())
                ->setCreatedAt($createdDate)
                ->setEditedAt($editedDate)
            ;
            $manager->persist($comment);
            $manager->flush();

            $this->nestedCommentId[] = $comment->getId();
        }
    }

    private function nestedComments(ObjectManager $manager)
    {
        $randomDates= new RandomDate();
        $editedDates = new RandomEdited();

        for ($i = 0; $i <20; $i++){
            $createdDate = $randomDates->get(12);
            $editedDate = $editedDates->edited(5);
            $comment = new Comment();
            $comment
                ->setUserId($this->randomId->getUserId())
                ->setNestedCommentId($this->randomId->getCommentId())
                ->setText(RandomJokesApi::get())
                ->setCreatedAt($createdDate)
                ->setEditedAt($editedDate)
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
