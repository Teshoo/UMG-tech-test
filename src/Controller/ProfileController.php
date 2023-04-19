<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ProfileController extends AbstractController
{
    #[Route('/app/profile', name: 'app_profile')]
    public function index(Environment $twig): Response
    {
        return $this->render('profile/index.html.twig');
    }
}
