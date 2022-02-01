<?php

namespace App\Controller;
use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListePersController extends AbstractController
{
    /**
     * @Route("/liste", name="liste_pers")
     */
 
    public function index():Response
    {//recuperation du repository grace au manager
    $em=$this->getDoctrine()->getManager();
    $personneRepository=$em->getRepository(Personne::class);
    //personneRepository herite de servciceEntityRepository ayant les methodes 
   // pour recuperer les données de la bdd
    $listePersonnes=$personneRepository->findAll();
    //transmission de l'arrayCollection à la vue
    return $this->render('liste_pers/index.html.twig', [
    'listepersonnes' => $listePersonnes,
    ]);
    }

}
