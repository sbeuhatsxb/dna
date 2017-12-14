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
                $data = $form->getData();
                if ($data) {
                    $ville_id=$data->getId();
                    $etre_id=$data->getId();
                    $espace_id=$data->getId();

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

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
