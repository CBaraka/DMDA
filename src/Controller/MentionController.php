<?php

namespace App\Controller;

use App\Entity\Mention;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class MentionController extends AbstractController
{
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