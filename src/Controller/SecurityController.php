<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login/basic', name: 'app_basic_login')]
    public function loginBasic(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/basic_login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/login/ldap', name: 'app_ldap_login')]
    public function loginLdap(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/ldap_login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    
    #[Route(path: 'login/basic/logout', name: 'app_basic_logout')]
    #[Route(path: 'login/ldap/logout', name: 'app_ldap_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}