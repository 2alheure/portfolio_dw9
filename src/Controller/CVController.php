<?php

namespace App\Controller;

use App\Repository\CentreDInteretRepository;
use App\Repository\CompetenceRepository;
use App\Repository\ExperienceRepository;
use App\Repository\FormationRepository;
use App\Repository\TechnologieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController {
    #[Route('/cv', name: 'app_cv')]
    public function index(
        TechnologieRepository $tr,
        ExperienceRepository $er,
        CentreDInteretRepository $cir,
        FormationRepository $fr,
        CompetenceRepository $cr,
    ): Response {
        $technos = $tr->findBy([], ['niveau' => 'DESC']);
        $experiences = $er->findBy([], ['debut' => 'DESC']);
        $centresDInteret = $cir->findAll();
        $competences = $cr->findAll();
        $formations = $fr->findBy([], ['debut' => 'DESC']);

        return $this->render(
            'cv/index.html.twig',
            compact(
                'technos',
                'experiences',
                'centresDInteret',
                'competences',
                'formations'
            )
        );
    }
}
