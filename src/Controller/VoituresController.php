<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use App\Form\VoitureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/voitures')]
class VoituresController extends AbstractController
{
    #[Route('', name: 'app_voitures', methods: ['GET'])]
    public function index(Request $request, VoitureRepository $repository): Response
    {
        $voitures = $repository->findall();

        return $this->render('voitures/index.html.twig', [
            'controller_name' => 'VoituresController', 
                'voitures' => $voitures,
        ]);
    }

    #[Route('/new', name: 'app_voitures_new', methods: ['GET', 'POST'])]
    #[Route('/edit/{id}', name: 'app_voitures_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]

    public function new(?Voiture $voiture, Request $request, EntityManagerInterface $manager): Response
    {
        $voiture ??= new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {           
            $manager->persist($voiture);
            $manager->flush();
            
            return $this->redirectToRoute('app_voitures');
        }

        return $this->render('voitures/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/detail/{id}', name: 'app_voitures_detail', methods: ['GET', 'POST'])]
    public function detail(?Voiture $voiture)
    {
        if($voiture){
        return $this->render('voitures/detail.html.twig', [
            'controller_name' => 'VoituresController', 
                'voiture' => $voiture,
        ]);
        } else {
            return $this->redirectToRoute('app_voitures');
        }
    }

    #[Route('/remove/{id}', name: 'app_voitures_remove', methods: ['GET', 'POST'])]
    public function remove(?Voiture $voiture, EntityManagerInterface $manager)
    {
        if($voiture){
            $manager->remove($voiture);
            $manager->flush();
            
            return $this->redirectToRoute('app_voitures');

        } else {
            return $this->redirectToRoute('app_voitures');
        }
    }

}
