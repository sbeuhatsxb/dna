<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Event;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends \Doctrine\ORM\EntityRepository
{
    public function recherche($ville_id)
    {
        if (isset($ville_id)) {
        $query=$this->createQueryBuilder('e')
                        ->leftJoin('e.ville', 'v')
                        ->where('v.id=  :ville')
                        ->setParameter('ville', $ville_id)
                        // ->andWhere('e.etres=  :etre')
                        // ->setParameter('etre', $etre->getId())
                        // ->andWhere('e.espace=  :espace')
                        // ->setParameter('espace', $espace->getId())
                        ->getQuery();
        // $query=$this->_em->createQuery('SELECT e,v from AppBundle:Event e JOIN e.ville v WHERE v.id=:id_ville')
        //                     ->setParameter('id_ville', $ville_id);
        return $query->getResult();
    }


    }

}
// $repository = $this->getDoctrine()->getRepository('AppBundle:Material');
// $query = $repository->createQueryBuilder('m')
// ->where('m.available_qty > :available_qty')
// ->andWhere()
// ->setParameter('available_qty', '0')
// ->getQuery();
//
// $materials = $query->getResult();
