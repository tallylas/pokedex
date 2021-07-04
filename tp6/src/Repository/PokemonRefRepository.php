<?php

namespace App\Repository;

use App\Entity\PokemonRef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PokemonRef|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonRef|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonRef[]    findAll()
 * @method PokemonRef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonRefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonRef::class);
    }

    // /**
    //  * @return PokemonRef[] Returns an array of PokemonRef objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PokemonRef
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
