<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController {
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,

            'username_parameter' => 'email',
            'password_parameter' => 'password',

            'page_title' => 'Connexion',

            'csrf_token_intention' => 'authenticate',
            'target_path' => $this->generateUrl('app_home'),

            'username_label' => 'Votre email',
            'password_label' => 'Votre mot de passe',
            'sign_in_label' => 'Se connecter',

            'remember_me_enabled' => true,
            'remember_me_checked' => true,
            'remember_me_label' => 'Se souvenir de moi',

            'forgot_password_enabled' => true,
            'forgot_password_path' => $this->generateUrl('app_forgot_password_request'),
            'forgot_password_label' => 'J\'ai oublié mon mot de passe',
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void {
    }
}
