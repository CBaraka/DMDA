<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param MailerInterface $mailer
     */
    public function index(Request $request , MailerInterface $mailer)
    {
      //$contact = new Contact();
      $form = $this->createForm(ContactType::class ); //$contact
      $form->handleRequest($request);
      if($form->isSubmitted()&& $form->isValid()){
        $contact = $form->getData();
       

          //ici nous enverrons le mail 
          $email = (new Email())
         
        ->from(['Email'])
          // On attribue le destinataire
          ->To('combo.baraka@gmail.com')
          // On crée le texte avec la vue
          ->subject('Time for Symfony Mailer!')
          ->text($this->renderView(
            'emails/contact.html.twig', compact('contact')
        ),
        'text/html');
      $mailer->send($email);
          // Permet un message flash de renvoi
      $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); 
      return $this->redirectToRoute('homepage');
        }


 // $em = $this->getDoctrine()->getManager();

          //$em->persist($contact); $em->flush();
          
      
        return $this->render('contact/index.html.twig', [
            'pagetitle' => 'ContactController',
            'form'=>$form->createView()
        ]);
    }
}
