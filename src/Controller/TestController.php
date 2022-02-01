<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test/{prenom}/{nom}/{age}/", name="test")
     */
    public function index(Request $request,int $age,$prenom,$nom): Response
    {
        $session=$request->getSession();
        $session->getFlashBag()->add("message","message informatif!");
        $session->getFlashBag()->add("message","message important!");
        $session->set('statut','primary');
        return $this->render('test/index.html.twig', [
        'nom' =>$nom,
        'prenom' =>$prenom,
        'age'=>$age
        ]);
        

    }
/**
* @Route("/redirection", name="redirection")
*/
public function redirection(Request $request): Response
{
    $session=$request->getSession();
    $info=$session->getFlashbag()->get('info');
    $affiche='';
    foreach($info as $message){
    $affiche.=$message.'<br>';
    }
    $nomUser=$session->get('user');
    return new Response("redirection: nom User= $nomUser et liste des 
    messages: <br> $affiche");
}
/**
* @Route("/information/{login}/{age}", name="information")
*/
public function information(Request $request,$login='toto',int $age=99): Response
{
$reponse=new Response("Bienvenue sur la page d'informations $login agé 
de $age ans!!");
return $reponse;
}



}
