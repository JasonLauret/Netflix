<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmType;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/film/new', name: 'createFilm')]
    #[Route('film/{id}/edit', name: 'editFilm')]
    public function form(Request $request, EntityManagerInterface $manager, Film $film = null)
    {
        if(!$film){
            $film = new Film();
        }
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($film);
            $manager->flush();
            return $this->redirectToRoute('film', [
                'id' => $film->getId()
            ]);
        }
        return $this->render('film/form.html.twig',[
            'formFilm' => $form->createView(),
            'editMode' => $film->getId() !== null
        ]);
    }

    #[Route('/show/{id}', name:'show')]
    public function show(FilmRepository $filmRepository, $id, Film $film){
        
        $showFilm = $filmRepository->find($id);
                    
        return $this->render('film/show.html.twig', [
            'showFilm' => $showFilm,
            'film' => $film
        ]);
    }
}