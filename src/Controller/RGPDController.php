<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RGPDController extends AbstractController {
    #[Route('/mentions', name: 'app_mentions')]
    public function mentions(): Response {
        return $this->renderRGPD('Mentions légales');
    }

    #[Route('/politique-de-confidentialite', name: 'app_pol_conf')]
    public function politiqueConf(): Response {
        return $this->renderRGPD('Politique de confidentialité');
    }
    
    #[Route('/cgu', name: 'app_cgu')]
    public function cgu(): Response {
        return $this->renderRGPD('Conditions Générales d\'Utilisation');
    }


    public function renderRGPD(string $titre): Response {
        return $this->render(
            'rgpd/index.html.twig',
            compact('titre')
        );
    }
}
