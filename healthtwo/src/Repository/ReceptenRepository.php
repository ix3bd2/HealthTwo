<?php

namespace App\Repository;

use App\Entity\Recepten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recepten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recepten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recepten[]    findAll()
 * @method Recepten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceptenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recepten::class);
    }

    // /**
    //  * @return Recepten[] Returns an array of Recepten objects
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
    public function findOneBySomeField($value): ?Recepten
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
