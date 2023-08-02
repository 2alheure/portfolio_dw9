<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController {
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response {

        $form = $this->createFormBuilder()
            ->add('email', EmailType::class, [
                'label' => 'Votre email'
            ])
            ->add('subject', TextType::class, [
                'label' => 'Le sujet de votre message'
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Envoyer l'email

            $email = new Email;
            $email
                ->from($form->get('email')->getData())
                ->replyTo($form->get('email')->getData())
                ->to('admin@yopmail.fr') // Votre email
                ->subject($form->get('subject')->getData())
                ->text(
                    'Un visiteur vous a écrit un message :' . PHP_EOL . PHP_EOL
                        . $form->get('message')->getData()
                );

            $mailer->send($email);
            
            $this->addFlash('success', 'Votre message a été envoyé.');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
