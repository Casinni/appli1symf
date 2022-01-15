<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Data\ListePersonnes;
use App\Entity\Personne;

class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //$mesPersonnes est le tableau statique de ListePersonnes contenant les données nom, prenom
        foreach(ListePersonnes::$mesPersonnes as $maPersonne){
            $dt = new \DateTime('now - 30 years');
            $personne=new Personne();
            $personne->setNom($maPersonne['nom']);
            $personne->setPrenom($maPersonne['prenom']);
            $personne->setDateNaiss($dt);
            //pour assurer la persistance , il faut utiliser l'objectManager
            $manager->persist($personne);

        }
        //insertion en bdd des objets persistés
        $manager->flush();
    }
}
