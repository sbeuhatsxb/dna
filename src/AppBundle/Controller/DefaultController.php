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
            $repository = $this->getDoctrine()->getRepository('AppBundle:Event');
            $query = $repository->createQueryBuilder('e')
                            ->where('e.ville=  :ville')
                            ->setParameter('ville', 'Strasbourg')
                            ->getQuery();
                            $events = $query->getResult();

            // $em = $this->getDoctrine()->getManager();
            // $events = $em->getRepository('AppBundle:Event')->recherche();

            return $this->render('default/resultats.html.twig', array(
                'events'=>$events,
            ));
        }



        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
