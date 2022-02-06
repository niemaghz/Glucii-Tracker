<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(ArticleRepository $articleRepository): Response
    {

        return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticlesController', 'user' => $this->getUser(),
            'articles' => $articleRepository->findAll(),
        ]);
    }
    /**
     * @Route("/articles/{id}", name="article")
     */
    public function index2(ArticleRepository $articleRepository, Article $article): Response
    {
        $articleI = $articleRepository->findById($article);
        // var_dump($articleI);

        return $this->render('articles/index2.html.twig', [
            'user' => $this->getUser(),
            'article' => $articleI,

        ]);
    }
}
