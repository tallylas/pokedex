<?php

namespace App\Repository;

use App\Entity\PokemonsCaptures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PokemonsCaptures|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonsCaptures|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonsCaptures[]    findAll()
 * @method PokemonsCaptures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonsCapturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonsCaptures::class);
    }

    // /**
    //  * @return PokemonsCaptures[] Returns an array of PokemonsCaptures objects
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
    public function findOneBySomeField($value): ?PokemonsCaptures
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
