<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class VoituresController extends AbstractController
{
    #[Route('/voitures', name: 'app_voitures')]
    public function index(?VoitureRespository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findall();
        return $this->render('voitures/index.html.twig', [
            'controller_name' => 'VoituresController', 
                'voitures' => $voitures,
        ]);
    }
}
