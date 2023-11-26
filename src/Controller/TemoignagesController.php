<?php

namespace App\Controller;
use App\Entity\Temoignages;
use App\Form\TemoignagesFormType;
use App\Repository\TemoignagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemoignagesController extends AbstractController
{
    #[Route('/temoignages', name: 'app_temoignages')]
    public function index(Request $request ,EntityManagerInterface $entityManager,TemoignagesRepository $repository ): Response
    {    
        
        $temoignages = new temoignages();
        $form = $this->createForm(TemoignagesFormType::class, $temoignages);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

        $entityManager->persist($temoignages);
        $entityManager->flush();
        
      
       

    

    }
        $temoignages= $repository->findAll();
        return $this->render('temoignages/index.html.twig', [
            'form' => $form->createView(),
            'temoignages' => $temoignages
            
            
            
        ]);
    
    }

    
          
    }
           
               
             
            
    
    
        
          
      