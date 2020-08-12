<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EvenementsController extends AbstractController
{
    /**
     * @Route("/evenements", name="evenements")
     */
    public function index()
    {
        return $this->render('evenements/index.html.twig', [
            'pagetitle' => 'Evenements',
        ]);
    }
}
