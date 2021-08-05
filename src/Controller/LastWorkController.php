<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LastWorkController extends AbstractController
{
    #[Route('/last-work', name: 'last_work')]
    public function index(): Response
    {
        return $this->render('last/index.html.twig', [
            'controller_name' => 'LastWorkController',
        ]);
    }
}