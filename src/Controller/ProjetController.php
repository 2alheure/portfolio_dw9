<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Projet;
use App\Repository\ProjetRepository;
use App\Repository\TechnologieRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ProjetController extends AbstractController {
    #[Route('/projets', name: 'app_projets')]
    public function index(ProjetRepository $projetRepository, TechnologieRepository $tr, Request $request): Response {

        $technologie = $tr->find(
            $request->query->get('techno_id', 'x')
        );
        $projets = $projetRepository->findAllForDisplay($technologie);

        return $this->render('projet/index.html.twig', compact('projets'));
    }

    #[Route('/projets/{id}', name: 'app_projet')]
    public function details(Projet $projet): Response {
        return $this->render('projet/details.html.twig', compact('projet'));
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/post-comment/{id}', name: 'app_post_comment', methods: ['POST'])]
    function postComment(Projet $projet, Request $request, EntityManagerInterface $em): Response {
        $token = $request->request->get('token');
        $message = $request->request->get('message');

        if (!$this->isCsrfTokenValid('post-comment', $token)) {
            $error = true;
            $this->addFlash('error', 'Erreur de token CSRF.');
        }

        if (empty($message)) {
            $error = true;
            $this->addFlash('error', 'Le message est requis.');
        }

        if (empty($error)) {
            $comment = new Commentaire;
            $comment->setContenu($message)
                ->setDate(new DateTime)
                ->setUtilisateur($this->getUser())
                ->setProjet($projet);

            $em->persist($comment);
            $em->flush();
            $this->addFlash('success', 'Commentaire posté avec succès.');
        }

        return $this->redirectToRoute('app_projet', [
            'id' => $projet->getId()
        ]);
    }
}
