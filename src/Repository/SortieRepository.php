<?php

namespace App\Repository;

use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sortie>
 *
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

   /**
    * @return Sortie[] Returns an array of Sortie objects
    */
   public function findByFilter(): array
   {    
        // return $this->createQueryBuilder("s")
        //        ->andWhere($this->_em->getExpressionBuilder()
        //                             ->notIn(
        //                                 "s",
        //                                 $this->createQueryBuilder('ss')
        //                                     ->leftJoin("ss.inscrits","p")
        //                                     ->andWhere('p = :participant')                                            
        //                                     ->getDQL()
        //                             )
        //                 )
        //        ->setParameter('participant', 1)
        //        ->getQuery()
        //        ->getResult()
        //         ; 
        return $this->createQueryBuilder("s")
                    ->andWhere(':participant NOT MEMBER OF s.inscrits')
                    ->setParameter('participant', 1)
                    ->getQuery()
                    ->getResult();
   }

//    public function findOneBySomeField($value): ?Sortie
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
