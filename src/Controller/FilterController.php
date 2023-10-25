<?php

namespace App\Controller;

use App\Class\Filter;
use App\Form\FilterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilterController extends AbstractController
{
    #[Route('/filter', name: 'app_filter')]
    public function index( Request $request ): Response
    {
        $filter = new Filter();
        $form = $this->createForm(FilterType::class,$filter);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            dd($filter);
        }

        return $this->render('filter/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
