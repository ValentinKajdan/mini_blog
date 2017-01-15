<?php
namespace AppBundle\Repository;
use Doctrine\ORM\Query;
use Doctrine\ORM\EntityRepository;
class TagsRepository extends EntityRepository
{
    /**
     * Récupère un tag par son identifiant
     *
     * @param  int $id
     *
     * @return Tags
     */
    public function getById($id)
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
