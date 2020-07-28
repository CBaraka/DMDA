<?php

namespace App\Controller;
use App\Entity\AdhesionParticuliers;
use App\Form\AdhesionParticuliersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdhesionParticuliersController extends AbstractController
{
    /**
     * @Route("/adhesion/particuliers", name="adhesion_particuliers")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request):Response
    {
        $adhesionParticulier = new AdhesionParticuliers();
         $form = $this->createForm(AdhesionParticuliersType::class, $adhesionParticulier);
         $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()){
             $em = $this->getDoctrine()->getManager();
             

             $em->persist($adhesionParticulier);
             $em->flush();

            return $this->redirectToRoute('homepage');
         }
        return $this->render('adhesion_particuliers/index.html.twig', [
            'pagetitle' => 'AdhesionParticuliersController',
            'form' => $form->createView()
        ]);
       
    }
      
}
