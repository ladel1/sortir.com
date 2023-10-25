<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Form\LieuType;
use App\Repository\LieuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PopupController extends AbstractController
{
    #[Route('/popup', name: 'app_popup')]
    public function index(Request $request,EntityManagerInterface $em): Response
    {
        $lieu = new Lieu();
        $form = $this->createForm(LieuType::class,$lieu);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($lieu);
            $em->flush();
        }
        return $this->render('popup/index.html.twig', [
            'form' => $form->createView(),
            'lieu'=>$lieu
        ]);
    }
}
