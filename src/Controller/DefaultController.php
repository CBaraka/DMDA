<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', [
            'pagetitle' => "Association DMDA Mayotte",
        ]);
    }
    /**
     * @Route("/adhesion", name="adhesion")
     */
    public function adhesion()
    {
        return $this->render('adhesion/index.html.twig', [
            'pagetitle' => "Adhésion",
        ]);
    }


    /**
     * @Route("/mentions_legales", name="mention")
     */
    public function mention()
    {
        return $this->render('mentions_legales/index.html.twig', [
            'pagetitle' => "Mentions Légales",
        ]);
    }
}
