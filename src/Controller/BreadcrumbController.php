<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BreadcrumbController extends AbstractController
{
    #[Route('/breadcrumb', name: 'breadcrumb')]
    public function index(Request $request): Response
    {
        $requestUri = $request->getRequestUri();
        
        return $this->render('breadcrumb/breadcrumb.html.twig', [
            'requestUri' => $requestUri,
        ]);
    }
}
