<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Article1Controller extends AbstractController
{
    /**
     * @Route("/article1", name="article1")
     */
    public function index(): Response
    {
        return $this->render('article1/index.html.twig', [
            'controller_name' => 'Article1Controller',
        ]);
    }
}
