<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin2856", name="admin2856")
     */
    public function index()
    {
        return $this->render('admin/dashboard.html.twig', [
            'pagetitle' => 'Administration',
        ]);
    }

    //connexion au Back-office

    /**
     * @Route("/connexion", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        /* if ($this->getUser()) {
            return $this->redirectToRoute('target_path');
        }
        */

        // obtenir l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();
        // dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/index.html.twig', [
            'pagetitle' => "connexion",
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/category", name="category")
     */
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    //Déconnexion du Back-office

    /**
     * @Route("/deconnexion", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    //administration

    /**
     * Require ROLE_ADMIN for *every* controller method in this class.
     *
     * @IsGranted("ROLE_ADMIN")
     * 
     * @Route("/dashboard", name="dashboard")
     */


    public function adminDashboard()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // or add an optional message - seen by developers
        // $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        //vous pouvez également rendre un modèle pour afficher un tableau de bord approprié
        return $this->render('admin/dashboard.html.twig', [
            'pagetitle' => "Tableau de board",
        ]);
    }
}
