<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

class SecurityController
{
    /**
     * @Route("/", name="security")
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]));
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, Environment $twig, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return new Response($twig->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        )));

    }
}
