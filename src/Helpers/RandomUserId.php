<?php
/**
 * Created by PhpStorm.
 * User: Katu
 * Date: 2019-06-12
 * Time: 13:59
 */

namespace App\Helpers;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class RandomUserId
{
    private $entityManager;

    /**
     * RandomUserId constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function get(): int
    {
        $userIds = $this->entityManager->getRepository(User::class)->getRandomUserId();
        $randomId = $userIds[array_rand($userIds)];
        return $randomId;
    }

}