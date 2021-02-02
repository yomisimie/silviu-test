<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('articles/index.html.twig', [
            'articles'          => $articles,
            'controller_name'   => 'ArticlesController',
        ]);
    }
    /**
     * @Route("/articles/{id}", name="article")
     */
    public function article($id): Response
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('articles/article.html.twig', [
            'article'          => $article,
            'controller_name'   => 'ArticlesController',
        ]);
    }
}
