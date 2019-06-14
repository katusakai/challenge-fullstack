<?php

namespace App\Controller;

use App\API\RandomJokesApi;
use App\Entity\Comment;
use App\Form\MainCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
    public function index(Request $request)
    {
        $mainCommentForm = $this->createForm(MainCommentType::class)
            ->handleRequest($request);
        if ($this->mainCommentCreated($mainCommentForm)) {

            return $this->redirectToRoute('comment');
        }
        $mainComments = $this->getDoctrine()->getRepository(Comment::class)->getMainComments();
        $nestedComments = $this->getDoctrine()->getRepository(Comment::class)->getNestedComments();
        return $this->render('comment/index.html.twig', [
            'mainComments' => $mainComments,
            'nestedComments' => $nestedComments,
            'mainCommentForm' => $mainCommentForm->createView(),
        ]);
    }

    private function mainCommentCreated($mainCommentForm)
    {
        if ($mainCommentForm->isSubmitted() && $mainCommentForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $newMainComment = $mainCommentForm->getData();
            $em->persist($newMainComment);
            $em->flush();

            return true;
        }
    }
}
