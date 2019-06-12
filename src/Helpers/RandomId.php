<?php
/**
 * Created by PhpStorm.
 * User: Katu
 * Date: 2019-06-12
 * Time: 13:59
 */

namespace App\Helpers;


use App\Entity\Comment;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class RandomId
{
    private $entityManager;

    /**
     * RandomId constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUserId(): int
    {
        $userIds = $this->entityManager->getRepository(User::class)->getRandomUserId();
        $randomId = $userIds[array_rand($userIds)];
        return $randomId;
    }

    public function getCommentId(): int
    {
        $commentIds = $this->entityManager->getRepository(Comment::class)->getRandomCommentId();
        $randomId = $commentIds[array_rand($commentIds)];
        return $randomId;
    }

}