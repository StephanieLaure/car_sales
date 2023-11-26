<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlePartController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_article_part')]

    public function show( ArticlesRepository $articlesRepository, int $id): Response

    {
        $articles = $articlesRepository -> findBy(['id' => $id]);


        return $this->render('article_part/index.html.twig', [
            'controller_name'=> 'N\'hesitez pas à nous écrire ',
            'articles'=> $articles

            
        ]);

    }
}