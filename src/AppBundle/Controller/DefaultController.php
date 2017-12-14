<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Event;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method({"POST", "GET"})
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\FormType');
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($request->getMethod() == 'POST') {
                $data_ville = $form["ville"]->getData();
                if ($data_ville) {
                    $ville_id=$data_ville->getId();
                }
                else {
                    $ville_id=null;
                }

                $data_etre = $form["etre"]->getData();
                if ($data_etre) {
                    $etre_id=$data_etre->getId();
                }
                else {
                    $etre_id=null;
                }

                $data_espace = $form["espace"]->getData();
                if ($data_espace) {
                    $espace_id=$data_espace->getId();
                }
                else {
                    $espace_id=null;
                }

                $em = $this->getDoctrine()->getManager();
                $events = $em->getRepository('AppBundle:Event')->recherche($ville_id, $etre_id, $espace_id);

                        //
                        //
                        // // $nbParticipants = $_POST['event'.$event->getNbParticipants()];
                        // if (isset($_GET["participer"]))
                        // {
                        //     $em = $this->getDoctrine()->getManager();
                        //     $event = $em->getRepository('AppBundle:Event')->findId();
                        //     var_dump($event);
                        // $nbParticipants=$event->getNbParticipants();
                        // var_dump($nbParticipants);
                        // $nbParticipants++;
                        // var_dump($nbParticipants);
                        // $event->setNbParticipants($nbParticipants);
                        // $em->persist($event);
                        // $em->flush();
                        // return $this->render('default/resultats2.html.twig', array(
                        //     'events'=>$events,
                        // ));
                        // }


                return $this->render('default/resultats.html.twig', array(
                    'events'=>$events,
                    'form'=>$form->createView(),
                ));    }
        }


        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
        /**
         * @Route("/monresultat/{id}", name="monresultat")
         * @Method("GET")
         */
        public function resultatAction(Event $event)
        {
            return $this->render('default/resultats2.html.twig', array(
                'event' => $event
            ));
      }

}
