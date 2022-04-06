<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    #[Route('/film', name: 'film')]
    public function index(FilmRepository $filmRepository): Response
    {
        $film = $filmRepository->findAll();
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
            'films' => $film
        ]);
    }

    #[Route('/show/{id}', name:'show')]
    public function show(FilmRepository $filmRepository, $id){
        
        $showFilm = $filmRepository->find($id);
                    
        return $this->render('film/show.html.twig', [
            'showFilm' => $showFilm
        ]);
    }
}
