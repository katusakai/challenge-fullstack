<?php

namespace App\Controller;

use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
    public function index()
    {
        $mainComments = $this->getDoctrine()->getRepository(Comment::class)->getMainComments();
        $nestedComments = $this->getDoctrine()->getRepository(Comment::class)->getNestedComments();
        return $this->render('comment/index.html.twig', [
            'mainComments' => $mainComments,
            'nestedComments' => $nestedComments,
        ]);
    }
}
