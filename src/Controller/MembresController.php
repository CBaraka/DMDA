<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MembresController extends AbstractController
{
    /**
     * @Route("/membres", name="membres")
     */
    public function index()
    {
        return $this->render('membres/index.html.twig', [
            'pagetitle' => 'Membres',
        ]);
    }
}
