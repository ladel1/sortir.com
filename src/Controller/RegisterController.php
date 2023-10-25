<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\CSVType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function index(Request $request,EntityManagerInterface $em): Response
    {
        $formCSV = $this->createForm(CSVType::class);
        $formCSV->handleRequest($request);

        if($formCSV->isSubmitted() && $formCSV->isValid()){
            $fileCSV = $formCSV->get("csv")->getData();
            $filename = $fileCSV->getPathname();
            if(($file = fopen($filename,"r")) !== FALSE){
                while(($user = fgetcsv($file,1000,";"))!==FALSE){
                    $participant = new Participant();
                    // set participant
                    $em->persist($participant);                    
                }
                $em->flush();
                $this->addFlash("","");
                return $this->redirectToRoute("");
            }
        }
        return $this->render('register/index.html.twig', [
            'formCSV' => $formCSV->createView(),
        ]);
    }
}
