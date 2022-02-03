<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Article3Controller extends AbstractController
{
    /**
     * @Route("/article3", name="article3")
     */
    public function index(): Response
    {
        return $this->render('article3/index.html.twig', [
            'controller_name' => 'Article3Controller',
        ]);
    }
}
