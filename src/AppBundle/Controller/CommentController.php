<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Comment controller
 * @Route("/")
 */
class CommentController extends Controller
{
    /**
     * List all comment entities.
     *
     * @Method("GET")
     * @param Post $post
     * @return Response
     */
    public function _shownCommentsAction(Post $post)
    {
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Comment')->findBy(
            ['post' => $post]
        );

        return $this->render(
            'post/show_comments.html.twig',
            array(
                'comments' => $comments,
            )
        );
    }

    /**
     * Creates a new comment entity
     *
     * @Route("/post/{id}/comment/new", name="new_comment")
     * @Method({"GET","POST"})
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse|Response
     */
    public function newCommentAction(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->setPost($post);
        $form = $this->createForm('AppBundle\Form\CommentType', $comment);
        $form->handleRequest($request);

        $deleteForm = $this->createDeleteForm($post);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('post_show', ['id' => $post->getId()]);
        }

        return $this->render(
            'post/new_comment.html.twig',
            array(
                'comment' => $comment,
                'form' => $form->createView(),
                'post' => $post,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to delete a post entity.
     *
     * @param Post $post The post entity
     *
     * @return FormInterface The form
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
