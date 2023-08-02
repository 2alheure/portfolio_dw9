<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetController extends AbstractController {
    #[Route('/projets', name: 'app_projets')]
    public function index(ProjetRepository $projetRepository): Response {
        $projets = $projetRepository->findAllForDisplay();
        return $this->render('projet/index.html.twig', compact('projets'));
    }
    
    #[Route('/projets/{id}', name: 'app_projet')]
    public function details(Projet $projet): Response {
        return $this->render('projet/details.html.twig', compact('projet'));
    }


}
