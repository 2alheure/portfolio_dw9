<?php

namespace App\Controller;

use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController {
    #[Route('/projets', name: 'app_projets')]
    public function index(ProjetRepository $projetRepository): Response {
        $projets = $projetRepository->findAllForDisplay();
        return $this->render('projet/index.html.twig', compact('projets'));
    }
}
