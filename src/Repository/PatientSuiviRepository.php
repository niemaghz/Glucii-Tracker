<?php

namespace App\Repository;

use App\Entity\PatientSuivi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatientSuivi|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatientSuivi|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatientSuivi[]    findAll()
 * @method PatientSuivi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientSuiviRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatientSuivi::class);
    }
    public function QteByDay(int $id)
    {
        /* $query = $this->createQueryBuilder('a')
            ->select('SUBSTRING(a.created_at,1,10) as Day, SUM(a.insuline) as Qte ')
            ->where(' IDENTITY(a.patient) = : id')
            ->setParameter('id', $id)
            ->groupBy('Day');
        return $query->getQuery()->getResult();
        */


        $query = $this->getEntityManager()->createQuery("
        SELECT SUBSTRING(a.createdAt, 1, 10) as Day, SUM(a.insuline) as Qte FROM App\Entity\PatientSuivi a where a.patient= :id GROUP BY Day
    ")->setParameter('id', $id);
        return $query->getResult();
    }



    // /**
    //  * @return PatientSuivi[] Returns an array of PatientSuivi objects
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
    public function findOneBySomeField($value): ?PatientSuivi
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
