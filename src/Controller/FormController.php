<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use App\Entity\Article;

class FormController extends AbstractController
{
    /**
     * @Route("/form/new", name="form-new")
     */
    public function new(Request $request): Response
    {
        $article = new Article();
        $article->setTitle('Hello World');
        $article->setContent('Un très court article.');
        $article->setAuthor('Zozor');
        $article->setDate(new DateTime());

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($article);
            $em->flush();
        }

        return $this->render(
            'default/new.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/form/edit/{id}", name="form-edit", requirements={"id"="\d+"})
     */
    public function edit(Request $request, Article $article)
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // va effectuer la requête d'UPDATE en base de données
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render(
            'default/new.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/form/delete/{id}", name="form-delete", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function delete(Article $article)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($article);
        $em->flush();

        // redirige la page
        return $this->redirectToRoute('form-new');
    }
}