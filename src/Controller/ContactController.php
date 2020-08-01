<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request):Response
    {
      $contact = new Contact();
      $form = $this->createForm(ContactType::class , $contact);
      $form->handleRequest($request);
      if($form->isSubmitted()&& $form->isValid()){
          $em = $this->getDoctrine()->getManager();

          $em->persist($contact);
          $em->flush();
          return $this->redirectToRoute('homepage');
      }
        return $this->render('contact/index.html.twig', [
            'pagetitle' => 'ContactController',
            'form'=>$form->createView()
        ]);
    }
}
