<?php

namespace App\Controller;

use App\Class\Uploader;
use App\Form\UploaderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploaderController extends AbstractController
{
    #[Route('/uploader', name: 'app_uploader')]
    public function index(Request $request): Response
    {
       
        $form = $this->createForm(UploaderType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $uploadedFile = $form->get("filename")->getData();          
            $open = fopen($uploadedFile->getPathname(),"r");
            while (($data = fgetcsv($open, 1000, ";")) !== FALSE) 
            {
                dump($data);
                // new Participant
                // persist
            }
            // flush
            dd();
        }
        
        return $this->render('uploader/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
