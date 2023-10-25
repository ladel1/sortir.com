<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $sortie = new Sortie();
        $form = $this->createForm(SortieType::class,$sortie);



        return $this->render('main/index.html.twig', [
            'formSortie'=>$form->createView()
        ]);
    }

    #[Route('/lieu/{id}', name: 'app_lieu')]
    public function lieu(Lieu $lieu): Response
    {
        return $this->json($lieu);
    }   
    
    #[Route('/test', name: 'app_test')]
    public function test(SortieRepository $repo): Response
    {
        dd($repo->findByFilter());
    }       
}
