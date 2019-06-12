<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getRandomUserId()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT u.id
                from user u
                ';
        $query = $conn->prepare($sql);
        $query->execute();

//        return $query->fetchAll();
        $result = [];
        foreach ($query->fetchAll() as $fetch){
            $result[] = $fetch['id'];
        }
        return $result;
    }
}
