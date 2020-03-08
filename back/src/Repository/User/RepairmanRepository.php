<?php

namespace App\Repository;

use App\Entity\User\Repairman;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Repairman|null find($id, $lockMode = null, $lockVersion = null)
 * @method Repairman|null findOneBy(array $criteria, array $orderBy = null)
 * @method Repairman[]    findAll()
 * @method Repairman[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairmanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repairman::class);
    }

    // /**
    //  * @return Repairman[] Returns an array of Repairman objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Repairman
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
