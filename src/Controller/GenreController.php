<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Form\GenreType;
use App\Repository\GenreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/a')]
class GenreController extends AbstractController
{
    #[Route('/genre', name: 'genre')]
    public function index(GenreRepository $genreRepository): Response
    {   
        $genre = $genreRepository->findAll();
        return $this->render('genre/genre.html.twig', [
            'genres' => $genre,
        ]);
    }

    #[Route('/genre/new', name: 'createGenre')]
    #[Route('/genre/{id}/edit', name: 'editGenre')]
    public function new(Request $request, EntityManagerInterface $manager, Genre $genre = null): Response
    {   
        if(!$genre){
            $genre = new Genre();
        }
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($genre);
            $manager->flush();
            
            return $this->redirectToRoute('genre', [
                'id' => $genre->getId()
            ]);
        }

        return $this->render('genre/formGenre.html.twig', [
            'formGenre' => $form->createView(),
            'editMode' => $genre->getId() !== null
        ]);
    }
}
