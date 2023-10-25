<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PopupController extends AbstractController
{
    #[Route('/popup', name: 'app_popup')]
    public function index(): Response
    {
        return $this->render('popup/index.html.twig', [
            'controller_name' => 'PopupController',
        ]);
    }
}
