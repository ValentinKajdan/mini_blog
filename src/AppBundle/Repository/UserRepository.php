<?php
namespace AppBundle\Repository;
use Doctrine\ORM\Query;
use Doctrine\ORM\EntityRepository;
class UserRepository extends EntityRepository
{
    /**
     * Vérifie si un user existe dans la bd
     *
     * @param  int $id
     *
     * @return Article
     */
    public function getUser($email, $password)
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.email = :email', 'm.password = :password')
            ->setParameter('email', $email)
            ->setParameter('password', $password)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
