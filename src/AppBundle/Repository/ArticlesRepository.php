<?php
namespace AppBundle\Repository;
use Doctrine\ORM\Query;
use Doctrine\ORM\EntityRepository;
class ArticlesRepository extends EntityRepository
{
    /**
     * Récupère un article par son identifiant
     *
     * @param  int $id
     *
     * @return Article
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

    /**
     * Récupère les 5 derniers articles
     *
     * @return Article
     */
    public function getLastFive()
    {
        return $this
            ->createQueryBuilder('m')
            ->orderBy('m.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
      ;
    }

    /**
     * Récupère les articles liés à une catégorie
     *
     * @param  int $categoryId
     *
     * @return Article
     */
    public function getByIdCat($categoryId)
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.categoryId = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery()
            ->getArrayResult()
        ;
    }
}
