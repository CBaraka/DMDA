<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DonController extends AbstractController
{
    /**
     * @Route("/don", name="don")
     */
    public function index()
    {
        return $this->render('don/index.html.twig', [
            'pagetitle' => 'Faire un don',
        ]);
    }
}
