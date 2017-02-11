<?php
namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;
class CommentsCountService
{
    /**
     * @var EntityManager
     */
    private $doctrine;
    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }
    /**
     * Retourne le nombre total de commentaires sur un article
     * @param  int $idArt Id de l'article
     * @return int
     */
    public function getTotalComments($idArt)
    {
        return $this
            ->doctrine
            ->getRepository('AppBundle:Comments')
            ->getCountTotalComments($idArt)
        ;
    }
}
