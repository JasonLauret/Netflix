<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\FilmLike;
use App\Form\FilmType;
use App\Repository\FilmLikeRepository;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class FilmController extends AbstractController
{
    #[Route('/film', name: 'film')]
    public function index(FilmRepository $filmRepository): Response
    {   
        $titreAlphabetiqueCroissant = $filmRepository->sortAscendingAlphabeticalOrder();
        $titreAlphabetiqueDecroissant = $filmRepository->sortDescendingAlphabeticalOrder();
        $oldestMovie = $filmRepository->sortByOldestMovie();
        $newestMovie =  $filmRepository->sortByNewestMovie();
        $film = $filmRepository->findAll();
        return $this->render('film/index.html.twig', [
            'films' => $film,
            'titreAlphabetiqueCroissants' => $titreAlphabetiqueCroissant,
            'titreAlphabetiqueDecroissants' => $titreAlphabetiqueDecroissant,
            'oldestMovies' => $oldestMovie,
            'newestMovies' => $newestMovie,
        ]);
    }
    

    #[Route('a/film/new', name: 'createFilm')]
    #[Route('a/film/{id}/edit', name: 'editFilm')]
    public function form(Request $request, EntityManagerInterface $manager, Film $film = null, SluggerInterface $slugger)
    {
        if(!$film){
            $film = new Film();
        }
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // picture
            $pictureFile = $form->get('image')->getData();
            if ($pictureFile) {
                $originalFilename = pathinfo($pictureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$pictureFile->guessExtension();
                try {
                    $pictureFile->move(
                        $this->getParameter('upload_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    var_dump($e);
                    die('Erreur');
                }
                $film->setImage($newFilename);
            }
            // movie
            $movieFile = $form->get('movie')->getData();
            if ($movieFile) {
                $originalFilename = pathinfo($movieFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$movieFile->guessExtension();
                try {
                    $movieFile->move(
                        $this->getParameter('upload_movie_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    var_dump($e);
                    die('Erreur');
                }
                $film->setMovie($newFilename);
            }

            $manager->persist($film);
            $manager->flush();
            
            // var_dump($form->getData());
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
    
    #[Route('a/film/remove/{id}', name:'removeFilm')]
    public function remove(Film $film, EntityManagerInterface $em){
        
        $em->remove($film);
        $em->flush();

        return $this->redirectToRoute('film');
    }

    #[Route('film/{id}/like', name:'film_like')]
    public function like(Film $film, EntityManagerInterface $em, FilmLikeRepository $filmLikeRepo) : Response{
        $user = $this->getUser();
        if(!$user){ 
            return $this->json([
                'code' => 403,
                'message' => 'Unauthorized'
            ], 403);
        }

        if($film->isLikeByUsers($user)){
            $like = $filmLikeRepo->findOneBy([
                'film' => $film,
                'user' => $user
            ]);

            $em->remove($like);
            $em->flush();

            return $this->json([
                'code' => 200,
                'message' => 'Like bien supprimé',
                'likes' => $filmLikeRepo->count(['film' => $film])
            ], 200);
        }

        $like = new FilmLike();
        $like->setFilm($film)
            ->setUser($user);
        
        $em->persist($like);
        $em->flush();

        return $this->json([
            'code' => 200, 
            'message' => 'Like bien ajouté',
            'likes' => $filmLikeRepo->count(['film' => $film])
        ], 200);
    }
}