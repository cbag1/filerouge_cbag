<?php

namespace App\Repository;

use App\Entity\Grpecompetences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Grpecompetences|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grpecompetences|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grpecompetences[]    findAll()
 * @method Grpecompetences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrpecompetencesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grpecompetences::class);
    }

    // /**
    //  * @return Grpecompetences[] Returns an array of Grpecompetences objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Grpecompetences
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
