<?php

namespace App\Repository;

use App\Entity\Grptags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Grptags|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grptags|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grptags[]    findAll()
 * @method Grptags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrptagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grptags::class);
    }

    // /**
    //  * @return Grptags[] Returns an array of Grptags objects
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
    public function findOneBySomeField($value): ?Grptags
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
