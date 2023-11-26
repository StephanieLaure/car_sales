<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{
    
    #[Route('/contact', name: 'app_contact')]
     
    public function sendEmail(Request $request, MailerInterface $mailer):Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $address = $data['email'];
            $message = $data['message'];
            
            $email = (new Email())
                ->from($address)
                ->to('queenshopbiz@gmail.com')
                ->subject('You got mail')
                ->text($message);
                    
                     
                

            $mailer->send($email);



             $this->addFlash('sucess' , 'ton message a été envoyé');
             

            return $this->redirectToRoute('app_home');
        }



        return $this->render('contact/index.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
    
}