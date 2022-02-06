<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        if ($user->getRoles() == 'ROLE_ADMIN') $test = true;
        else $test = false;

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController', 'user' => $user, 'test' => $test,
        ]);
    }
}
