<?php

namespace App\Controller;

use App\Entity\DescAsso;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends AbstractController
{

    /** 
     * @Route("/", name="homepage") 
     *@param Request $request
     *@return Response
     */
    public function index(Request $request): Response
    {
        $description = $this->getDoctrine()->getRepository(DescAsso::class)->findAll();
        $comment = $this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Hydrate notre commentaire avec la date et l'heure courants
            $commentaire->setCreatedAt(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();

            $em->persist($commentaire);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render('homepage/index.html.twig', [
            'pagetitle' => "Association DMDA Mayotte",
            'description' => $description,
            'form' => $form->createView(),
            'comment' => $comment
        ]);
    }
}
