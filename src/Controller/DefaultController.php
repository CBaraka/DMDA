<?php

namespace App\Controller;

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
     * @Route("mention", name="mention")
     */
    public function mention()
    {
        return $this->render('mentions_legales/index.html.twig', [
            'pagetitle' => "Mentions Légales",
        ]);
    }
}
