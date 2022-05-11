<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BreadcrumbsController extends AbstractController
{
    #[Route('/breadcrumbs', name: 'app_breadcrumbs')]
    public function index(): Response
    {
        return $this->render('breadcrumbs/index.html.twig', [
            'controller_name' => 'BreadcrumbsController',
        ]);
    }
}
