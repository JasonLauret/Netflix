<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categorys' => $category,
        ]);
    }

    #[Route('a/category/new', name: 'createCategory')]
    #[Route('a/category/{id}/edit', name: 'editCategory')]
    public function form(Request $request, EntityManagerInterface $manager, Category $category = null)
    {
        if(!$category){
            $category = new Category();
        }
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($category);
            $manager->flush();
    
            return $this->redirectToRoute('category', [
                'id' => $category->getId()
            ]);
        }
        return $this->render('category/form.html.twig',[
            'formCategory' => $form->createView(),
            'editMode' => $category->getId() !== null
        ]);
    }
}
