<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(TranslatorInterface $translator): Response
    {
        $message = $translator->trans('Welcome to my site');
        $this->addFlash('message', $message);

        return $this->render('home/index.html.twig', [
            
        ]);
    }
}
