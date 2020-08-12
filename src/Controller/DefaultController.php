<?php

namespace App\Controller;

use App\Entity\DescAsso;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $description = $this->getDoctrine()->getRepository(DescAsso::class)->findAll();
        return $this->render('homepage/index.html.twig', [
            'pagetitle' => "Association DMDA Mayotte",
            'description' => $description,
        ]);
    }
}
