<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function getMainComments()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT DISTINCT c.id, c.text, c.created_at, c.edited_at, u.username, u.id as user_id, u.first_name, u.last_name, u.email, u.profile_picture
                FROM comment c
                INNER JOIN user u
                  ON c.user_id = u.id
                WHERE c.nested_comment_id IS NULL
                ORDER BY c.created_at ASC  
                ';

        $query = $conn->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getNestedComments()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT DISTINCT c.id, c.nested_comment_id, c.text, c.created_at, c.edited_at, u.username, u.id as user_id, u.first_name, u.last_name, u.email, u.profile_picture
                FROM comment c
                INNER JOIN user u
                  ON c.user_id = u.id
                WHERE c.nested_comment_id IS NOT NULL
                ORDER BY c.created_at ASC  
                ';

        $query = $conn->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getRandomCommentId()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT c.id
                FROM comment c
                ';
        $query = $conn->prepare($sql);
        $query->execute();

        $result = [];
        foreach ($query->fetchAll() as $fetch){
            $result[] = $fetch['id'];
        }
        return $result;
    }
}
