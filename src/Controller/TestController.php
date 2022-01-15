<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TestController extends AbstractController
{
    /**
     * @Route("/test/{age}/{prenom}/{nom}", name="test",requirements={"nom"="[a-z]{2,30}"})
     */
    public function index(Request $request,int $age,$prenom,$nom): Response
    {
   
    
     $session=$request->getSession();
     $session->getFlashBag()->add("message","message informatif!");
     $session->getFlashBag()->add("message","message important!");
     $session->set('statut','primary');
     return $this->render('test/index.html.twig', [
    'controller_name' => 'TestController',
    'nom' =>$nom,
    'prenom' =>$prenom,
    'age'=>$age,
    'bienvenue'=>'<h3>Vous êtes bienvenu sur ce site<h3>'
    ]);
    
    


        /* creation route 
        $reponse=new Response();
        $reponse->setContent("Page d'accueil");
        $reponse->headers->setCookie(Cookie::create('login','Victor_Hugo'));
        return $reponse;*/
    

        //session et flashback
      /* $session=$request->getSession();
        $session->getFlashBag()->add("info","message informatif!");
        $session->getFlashBag()->add("info","message important!");
        $session->set('user',"lamy");
      $url = $this->generateUrl('redirection');
        return $this->redirect($url);*/
       /* affichage de la route' 
        echo $request->getPathInfo();*/
        /*affichage du parametre de la requete info
        localhost:8000/test?info=pascal
        
        echo $request->query->get('info');*/
            /* affichage de tous les parametres
            print_r($request->query->all());*/
    /*retour de la réponse*/
      /*  $reponse=new Response("Bienvenue dans Symfony!!");
        $reponse->headers->set('Content-Type','text/plain');
        $reponse->setStatusCode(Response::HTTP_NOT_FOUND);
        $reponse->setCharset('ISO-8859-1');
        $reponse->headers->setCookie(Cookie::create('login','Victor Hugo'));*/
      /* $reponse=new JsonResponse(["temp"=>8.1,"feels_like"=>4.75,"temp_min"=>7.01,"temp_max"=>8.47,"pressure"=>1015]);*/

      //$reponse= new RedirectResponse('https://lamy.bzh'); 

     /* $reponse= new StreamedResponse();
      $reponse->setcallback(function(){
          var_dump("bonjour tout le monde!");
          flush();// — Vide les tampons de sortie du système
          sleep(2);
          var_dump("bonjour !");
          flush();
      });
        
     $reponse->send();*/
    
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
    return new Response("redirection: nom User= $nomUser et liste des messages: <br> $affiche");
    }
     /**
     * @Route("/information/{login}/{age}", name="information",requirements={"login"="[a-z]{5,30}"})
     */
    public function information(Request $request,  $login,int $age): Response
    {
        $reponse=new Response("Bienvenue sur la page d'informations $login agé de $age ans!!");
    
    return $reponse;
    }
}
