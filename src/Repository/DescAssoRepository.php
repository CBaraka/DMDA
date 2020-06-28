<?php

namespace App\Repository;

use App\Entity\DescAsso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DescAsso|null find($id, $lockMode = null, $lockVersion = null)
 * @method DescAsso|null findOneBy(array $criteria, array $orderBy = null)
 * @method DescAsso[]    findAll()
 * @method DescAsso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DescAssoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DescAsso::class);
    }

    // /**
    //  * @return DescAsso[] Returns an array of DescAsso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DescAsso
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
