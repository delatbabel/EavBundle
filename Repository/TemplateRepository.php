<?php

namespace Opifer\EavBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * Template Repository
 */
class TemplateRepository extends EntityRepository
{
    /**
     * Find templates by request
     *
     * @param Request $request
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findByRequest(Request $request)
    {
        $qb = $this->createQueryBuilder('t');

        if ($request->get('name')) {
            $qb->andWhere('name =  :name')->setParameter('name', $request->get('name'));
        }

        return $qb->getQuery()->getArrayResult();
    }
}
