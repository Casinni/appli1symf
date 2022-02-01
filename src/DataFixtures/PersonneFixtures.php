<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\data\ListePersonnes;
use App\Entity\Personne;
class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach(ListePersonnes::$mesPersonnes as $maPersonne){
            $dt = new \DateTime('now - 30 years');
            $personne=new Personne();
            $personne->setNom($maPersonne['nom']);
            $personne->setPrenom($maPersonne['prenom']);
            $personne->setDateNaiss($dt);
            $personne->setEmail($maPersonne['email']);
            $personne->setTelephone($maPersonne['telephone']);
            $personne->setLogin($maPersonne['login']);
            $personne->setPassword($maPersonne['password']);
            //pour assurer la persistance , il faut utiliser l'objectManager
            $manager->persist($personne);
            }

        $manager->flush();
    }
}
