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
            $ville=$request->request->get('ville');
            $em = $this->getDoctrine()->getManager();
            $events = $em->getRepository('AppBundle:Event')->recherche($ville);

            return $this->render('default/resultats.html.twig', array(
                'events'=>$events,
            ));
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
