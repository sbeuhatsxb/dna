<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Event;
use AppBundle\Entity\Ville;
use AppBundle\Entity\Etre;
use AppBundle\Entity\Espace;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //récupération d'un flux XML sur le web ou dans un fichier - ici fichier -> CURLOPT FILE
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, "dna.xml");
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $contenu = curl_exec($curl);
        // print_r($contenu);
        // $results = new \SimpleXMLElement("$contenu");

        $results = simplexml_load_file("src/AppBundle/DataFixtures/dna.xml");

        // echo "<pre>".print_r($xml)."</pre>";

        // ->/results->/events->category->theme->event->meta->key

        foreach ($results->events->category as $category) {
            foreach ($category->theme as $theme) {
                foreach ($theme->event as $event) {
                    $meta = $event->meta;
                    $coulage = $event->coulage;
                    $dateEvent = explode(" ",$meta->PeriodesInteret->PeriodeInteret->DateDebut);
                    $today = '16/12/2017';
                    $dateEvent2 = (string)$coulage->Ref_datepremiereoccurence->dateRef->DateDebut;
                    $today2 = 'samedi 16 décembre';
                    if($dateEvent[0] === $today || $dateEvent2 === $today2)
                    {

                        $event = New Event();
                        $event->setTheme((string)$coulage->Categorie);
                        $event->setTitre((string)$coulage->Titre);
                        $event->setDescription((string)$coulage->Description);
                        $event->setDescriptionComplementaire((string)$coulage->DescriptionComplementaire);
                        $event->setLieu((string)$coulage->Lieu);
                        $event->setAdresse((string)$coulage->Adresse);
                        $event->setCp((string)$coulage->CodePostal);
                        $event->setHoraire((string)$coulage->Ref_datepremiereoccurence->dateRef->Horaires);
                        $event->setTelephone((string)$meta->Contacts->Contact->Telephone);
                        $event->setNbParticipants(rand(0,1500));

                        // $ville = New Ville();
                        // $ville->setNomVille((string)$coulage->Ville);
                        // $manager->persist($ville);

                    }

                }

                $etre = New Etre();
                $etre->setLabel("");
                $etre = New Etre();
                $etre->setLabel("émerveillé");
                $etre = New Etre();
                $etre->setLabel("aventurier");
                $etre = New Etre();
                $etre->setLabel("spectateur");
                $etre = New Etre();
                $etre->setLabel("gourmand");
                $etre = New Etre();
                $etre->setLabel("curieux");
                $etre = New Etre();
                $etre->setLabel("instruit");
                $etre = New Etre();
                $etre->setLabel("généreux");
                $etre = New Etre();
                $etre->setLabel("joueur");
                $etre = New Etre();
                $etre->setLabel("chineur");
                $etre = New Etre();
                $etre->setLabel("sportif");
                $etre = New Etre();
                $etre->setLabel("danseur");
                $etre = New Etre();
                $etre->setLabel("sociable");
                $manager->persist($etre);



                $espace = New Espace();
                $espace->setLabel("Intérieur");
                $espace = New Espace();
                $espace->setLabel("Extérieur");
                $manager->persist($espace);


                $manager->flush();
            }
        }
    }
}
