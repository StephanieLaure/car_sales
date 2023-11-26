<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use App\Repository\TemoignagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ArticlesRepository $repository): Response
    {
        
        $articles = $repository ->findby(['moteur'=> 'diesel']);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Bienvenu sur VP Garage',
            'articles' => $articles
        ]);
    }

   


}