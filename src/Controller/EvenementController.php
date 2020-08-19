<?php

namespace App\Controller;

use App\Entity\Evenements;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="evenement")
     */
    public function index()
    {
        $events= new Evenements();
        $evenement = $this->getDoctrine()->getRepository(Evenements::class)->findAll();
        $events->setDate(new \DateTime());
        return $this->render('evenement/index.html.twig', [
            'pagetitle' => 'Evenement',
            'evenement' => $evenement,
        ]);
    }
}
