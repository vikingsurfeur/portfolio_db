<?php

namespace App\Controller;

use App\Repository\PhotographRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LastWorkController extends AbstractController
{
    #[Route('/last-work', name: 'last_work')]
    public function index(PhotographRepository $photographRepository): Response
    {
        return $this->render('last/index.html.twig', [
            'controller_name' => 'LastWorkController',
            'photographs' => $photographRepository->lastThreeWork(),
        ]);
    }
}