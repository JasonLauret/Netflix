<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Film $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Film $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function sortAscendingAlphabeticalOrder()
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.titre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function sortDescendingAlphabeticalOrder()
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.titre', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function sortByOldestMovie()
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.releaseYear', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function sortByNewestMovie()
    {         
        return $this->createQueryBuilder('f')
            ->orderBy('f.releaseYear', 'DESC')             
            ->getQuery()             
            ->getResult()         
        ;     
    }

    // /**
    //  * @return Film[] Returns an array of Film objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Film
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
