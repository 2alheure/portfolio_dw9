<?php

namespace App\Controller\Admin;

use App\Entity\CentreDInteret;
use App\Entity\Commentaire;
use App\Entity\Competence;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Image;
use App\Entity\Projet;
use App\Entity\Technologie;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController {
    #[Route('/admin', name: 'admin')]
    public function index(): Response {
        return $this->render('admin/home.html.twig');
    }

    public function configureDashboard(): Dashboard {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable {
        yield MenuItem::section('Les projets');
        yield MenuItem::linkToCrud('Les projets', 'fas fa-code', Projet::class);
        yield MenuItem::linkToCrud('Les images', 'fas fa-image', Image::class);
        yield MenuItem::linkToCrud('Les commentaires', 'fas fa-comment', Commentaire::class);

        yield MenuItem::section('Le CV');
        yield MenuItem::linkToCrud('Les compétences', 'fas fa-layer-group', Competence::class);
        yield MenuItem::linkToCrud('Les centres d\'intérêt', 'fas fa-star', CentreDInteret::class);
        yield MenuItem::linkToCrud('Les expériences', 'fas fa-fill', Experience::class);
        yield MenuItem::linkToCrud('Les formations', 'fas fa-school', Formation::class);
        yield MenuItem::linkToCrud('Les technologies', 'fas fa-tools', Technologie::class);


        yield MenuItem::section('Les utilisateurs');
        yield MenuItem::linkToCrud('Les utilisateurs', 'fas fa-user', Utilisateur::class);

        yield MenuItem::section('Autres');
        yield MenuItem::linkToUrl('Revenir à l\'accueil', 'fa fa-home', '/');
    }
}
