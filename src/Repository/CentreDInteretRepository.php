<?php

namespace App\Repository;

use App\Entity\CentreDInteret;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CentreDInteret>
 *
 * @method CentreDInteret|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentreDInteret|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentreDInteret[]    findAll()
 * @method CentreDInteret[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreDInteretRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentreDInteret::class);
    }

//    /**
//     * @return CentreDInteret[] Returns an array of CentreDInteret objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CentreDInteret
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
