<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GestionController extends AbstractController
{
    #[Route('/gestion-locative', name: 'app_gestion')]
    public function index(
    ): Response {
        return $this->render(
            'gestion/index.html.twig'
        );
    }
}
