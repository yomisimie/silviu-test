<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleEditType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard");
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("", name="dashboard")
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('dashboard/index.html.twig', [
            'articles'          => $articles,
            'controller_name'   => 'DashboardController',
        ]);
    }

    /**
     * @Route("/articles/{id}", name="edit-article")
     */
    public function edit($id, Request $request): Response
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        $form = $this->createForm(ArticleEditType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($article);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Article has been saved!');
        }
        return $this->render('dashboard/article.html.twig', [
            'article'           => $article,
            'form'              => $form->createView(),
            'controller_name'   => 'DashboardController',
        ]);
    }
}
