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
                $ville = $form["ville"]->getData()->getNomVille();
                // $etre = $form["etre"]->getData()->getLabel();
                // $espace = $form["espace"]->getData()->getLabel();
                var_dump($ville);

                // var_dump($espace);
                $em = $this->getDoctrine()->getManager();
                $events = $em->getRepository('AppBundle:Event')->rechercheVille($ville);
                // $events = $em->getRepository('AppBundle:Event')->rechercheEtre($etre);
                // $events = $em->getRepository('AppBundle:Event')->rechercheEspace($espace);
                var_dump($events);

                return $this->render('default/resultats.html.twig', array(
                    'events'=>$events,
                ));    }

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
