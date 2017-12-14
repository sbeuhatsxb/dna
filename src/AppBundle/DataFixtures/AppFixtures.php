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
        $villes = [];



        $espace_au_chaud = New Espace();
        $espace_au_chaud->setLabel("au chaud");
        $manager->persist($espace_au_chaud);

        $espace_au_froid = New Espace();
        $espace_au_froid->setLabel("au frais");
        $manager->persist($espace_au_froid);


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

                        $nom_ville = (string)$coulage->Ville;
                        if(!array_key_exists($nom_ville, $villes))
                        {
                            $ville = New Ville();
                            $ville->setNomVille($nom_ville);
                            $manager->persist($ville);
                            $villes[$nom_ville] = $ville;
                        }

                        $event = New Event();
                        $event->setTheme((string)$coulage->Categorie);
                        $event->setTitre((string)$coulage->Titre);
                        $event->setDescription((string)$coulage->Description);
                        $event->setDescriptionComplementaire((string)$coulage->DescriptionComplementaire);
                        $event->setLieu((string)$coulage->Lieu);
                        $event->setVille($villes[$nom_ville]);
                        $event->setAdresse((string)$coulage->Adresse);
                        $event->setCp((string)$coulage->CodePostal);
                        $event->setHoraire((string)$coulage->Ref_datepremiereoccurence->dateRef->Horaires);
                        $event->setTelephone((string)$meta->Contacts->Contact->Telephone);
                        $event->setNbParticipants(rand(0,100));
                        $event->setEspace($espace_au_chaud);
                        $manager->persist($event);



                    }

                }

            }
        }


        $etre = New Etre();
        $etre->setLabel("émerveillé(e)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("aventurier(-ière)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("spectateur(e)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("gourmand(e)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("curieux(-se)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("instruit(e)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("généreux(-se)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("joueur(-se)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("chineur(-se)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("sportif(-ve)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("danseur(-se)");
        $manager->persist($etre);
        $etre = New Etre();
        $etre->setLabel("sociable");
        $manager->persist($etre);



        $manager->flush();
    }
}
