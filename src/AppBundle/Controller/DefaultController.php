<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


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
                // $etre_id = $form["etre"]->getData()->getId();
                // $espace_id = $form["espace"]->getData()->getId();
                // var_dump($espace_id);

                // $ville = $em->getRepository('AppBundle:Ville')->find($ville_id);
                // $etre = $em->getRepository('AppBundle:Etre')->find($etre_id);
                // $espace = $em->getRepository('AppBundle:Espace')->find($espace_id);
                $em = $this->getDoctrine()->getManager();
                $events = $em->getRepository('AppBundle:Event')->recherche($ville_id, $etre_id, $espace_id);
                // $events= $ville->getEvents();
                // var_dump(count($events));
                // $events = $em->getRepository('AppBundle:Event')->rechercheEspace($espace);

                return $this->render('default/resultats.html.twig', array(
                    'events'=>$events,
                ));    }

        }
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('AppBundle:Event');
        foreach ($events as $event) {

            if ($request->request->get('event'.$event->getID()))
            {
                $nbParticipants=$event->getNbParticipants();
                var_dump($nbParticipants);
                $nbParticipants++;
                $event->setNbParticipants($nbParticipants);
                $em = $this->getDoctrine()->getManager();
                $em->persist($event);
                $em->flush();
            }
        }

        $this->addFlash(
             'notice',
             "Merci pour votre réservation. La liste du matériel demandée est celle figurant ci-dessous. Nous vous confirmerons votre demande sous 3 jours ouvrés. Avec nos meilleurs salutations. L'équipe de la Bidouillothèque by Alsace Digitale."
         );

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
