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
    /**
     * @return int|mixed|string|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function countAlladhParticulier()
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id) as value');

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
