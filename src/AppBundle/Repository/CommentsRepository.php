<?php
namespace AppBundle\Repository;
use Doctrine\ORM\Query;
use Doctrine\ORM\EntityRepository;
class CommentsRepository extends EntityRepository
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
     * Récupère les commentaires liés à un article
     *
     * @param  int $idArticle
     *
     * @return Comment
     */
    public function getByIdArt($idArticle)
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.idArticle = :idArticle')
            ->setParameter('idArticle', $idArticle)
            ->getQuery()
            ->getArrayResult()
        ;
    }
}
