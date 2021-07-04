<?php

namespace App\Repository;

use App\Entity\Chasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Chasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chasse[]    findAll()
 * @method Chasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chasse::class);
    }

    // /**
    //  * @return Chasse[] Returns an array of Chasse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chasse
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
