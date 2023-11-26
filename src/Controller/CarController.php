<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{



    #[Route('/car', name: 'app_car')]
    public function index(ArticlesRepository $repository): Response
    {
        $articles = $repository ->findAll();
        return $this->render('car/index.html.twig', [
            'controller_name' => 'Nos differentes voitures',
            'articles'=> $articles
        ]);
    }

        
    }

