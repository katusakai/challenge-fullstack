<?php

namespace App\Controller;

use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $mainComments = $this->getDoctrine()->getRepository(Comment::class)->getMainComments();
        $nestedComments = $this->getDoctrine()->getRepository(Comment::class)->getNestedComments();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'mainComments' => $mainComments,
            'nestedComments' => $nestedComments,
        ]);
    }
}
