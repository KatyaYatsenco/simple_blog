<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Tag;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller
 * @Route("/")
 */
class TagController extends Controller
{
    /**
     * Creates a new tag entity
     *
     * @Route("/post/{id}/tag/new", name="new_tag")
     * @Method({"GET","POST"})
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request, Post $post)
    {
        $tag = new Tag();
        $tag->setPost($post);

        $form = $this->createForm('AppBundle\Form\TagType', $tag);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('post_show', ['id' => $post->getId()]);
        }

        return $this->render(
            'post/new_tag.html.twig',
            [
                'tag' => $tag,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Method("GET")
     * @param Post $post
     * @return Response
     */
    public function _showAction(Post $post)
    {
        $em = $this->getDoctrine()->getManager();
        $tags = $em->getRepository('AppBundle:Tag')->findBy(
            ['post' => $post]
        );

        return $this->render(
            'post/show_tags.html.twig',
            [
                'tags' => $tags,
            ]
        );

    }

    /**
     * @Route("/tags" ,name="show_tags")
     * @Method("GET")
     */
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();

        return $this->render(
            'post/show_tags.html.twig',
            [
                'tags' => $tags,
            ]
        );

    }
}
