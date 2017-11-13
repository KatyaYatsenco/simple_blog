<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 * @Route("/")
 */
class PostController extends Controller
{
    /**
     * Lists all post entities.
     *
     * @Route("/", name="_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        //PDO connection
//        $pdo = new \PDO('mysql:host=127.0.0.1;dbname=symfony','root',null);
//        $posts = $pdo->query('select * from post');

        //SQL
        /** @var \Doctrine\DBAL\Connection $connection */
//        try {
//            $connection = $this->getDoctrine()->getConnection();
//            $posts = $connection->query('select * from post');
//
//        } catch (\Exception $e) {
//            throw new Exception('Connect denied.'.$e);
//        }

        //Entity manager connection
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findAll();

        //DQL with pagination
//        $em2 = $this->get('doctrine.orm.entity_manager');
//        $dql = "SELECT a FROM AppBundle:Post a";
//        $query = $em2->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            2/*limit per page*/
        );

        // parameters to template
//        return $this->render('AcmeMainBundle:Article:list.html.twig', array('pagination' => $pagination));
        return $this->render(
            'post/index.html.twig',
            array(
                'posts' => $posts,
                'pagination' => $pagination,
            )
        );
    }

    /**
     * Creates a new post entity.
     *
     * @Route("/post/new", name="post_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm('AppBundle\Form\PostType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_show', array('id' => $post->getId()));
        }

        return $this->render(
            'post/new_post.html.twig',
            array(
                'post' => $post,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/post/{id}", name="post_show")
     * @Method("GET")
     * @param Post $post
     * @param Comment $comment
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Comment')->findBy(
            ['post' => $post]
        );

        return $this->render(
            'post/show_post.html.twig',
            array(
                'post' => $post,
                'delete_form' => $deleteForm->createView(),
                'comments' => $comments,
            )
        );
    }

    /**
     * Creates a form to delete a post entity.
     *
     * @param Post $post The post entity
     *
     * @return \Symfony\Component\Form\FormInterface The form
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Displays a form to edit an existing post entity.
     *
     * @Route("/post/{id}/edit", name="post_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);
        $editForm = $this->createForm('AppBundle\Form\PostType', $post);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_show', array('id' => $post->getId()));
        }

        return $this->render(
            'post/edit_post.html.twig',
            array(
                'post' => $post,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a post entity.
     *
     * @Route("/post/{id}", name="post_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('_index');
    }
}
