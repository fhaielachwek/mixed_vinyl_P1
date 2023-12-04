<?php

namespace App\Repository;

use App\Entity\VinylMix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VinylMix>
 *
 * @method VinylMix|null find($id, $lockMode = null, $lockVersion = null)
 * @method VinylMix|null findOneBy(array $criteria, array $orderBy = null)
 * @method VinylMix[]    findAll()
 * @method VinylMix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinylMixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VinylMix::class);
    }

//    /**
//     * @return VinylMix[] Returns an array of VinylMix objects
//     */
   public function findByExampleField($value): array
    {
       return $this->createQueryBuilder('v')
           ->andWhere('v.exampleField = :val')
           ->setParameter('val', $value)
           ->orderBy('v.id', 'ASC')
          ->setMaxResults(10)
           ->getQuery()
           ->getResult()
      ;
    }

   public function findAllOrderedByVotes($value): ?VinylMix
   {
    $queryBuilder = $this->addOrderByVotesQueryBuilder();
    return $this->createQueryBuilder('mix')
    ->orderBy('mix.votes', 'DESC');

    return $queryBuilder
    ->getQuery()
    ->getResult()

    if ($genre) {
        $queryBuilder->andWhere('mix.genre = :genre')
            ->setParameter('genre', $genre);
    }
    private function addOrderByVotesQueryBuilder(QueryBuilder $queryBuilder = null): QueryBuilder
    {
        $queryBuilder = $queryBuilder ?? $this->createQueryBuilder('mix');
    }

    }
}

