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
                // var_dump($data);
                // $etre_id = $form["etre"]->getData()->getId();
                // $espace_id = $form["espace"]->getData()->getId();
                $ville_id=$form["ville"]->getData()->getId();

                $em = $this->getDoctrine()->getManager();
                // $ville = $em->getRepository('AppBundle:Ville')->find($ville_id);
                // $etre = $em->getRepository('AppBundle:Etre')->find($etre_id);
                // $espace = $em->getRepository('AppBundle:Espace')->find($espace_id);

                // $events= $ville->getEvents();
                // var_dump(count($events));
                $events = $em->getRepository('AppBundle:Event')->recherche($ville_id);
                // $events = $em->getRepository('AppBundle:Event')->rechercheEspace($espace);
                return $this->render('default/resultats2.html.twig', array(
                    'events'=>$events,
                ));    }

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
