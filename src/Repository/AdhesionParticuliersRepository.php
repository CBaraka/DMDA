<?php

namespace App\Repository;

use App\Entity\AdhesionParticuliers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdhesionParticuliers|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdhesionParticuliers|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdhesionParticuliers[]    findAll()
 * @method AdhesionParticuliers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdhesionParticuliersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdhesionParticuliers::class);
    }

    // /**
    //  * @return AdhesionParticuliers[] Returns an array of AdhesionParticuliers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdhesionParticuliers
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
