<?php

namespace App\Repository;

use App\Entity\Task;
use App\Entity\TaskFilter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method Task[]    findAll()
 * @method Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    // /**
    //  * @return Task[] Returns an array of Task objects
    //  */

    public function findByCreateAndStatus(TaskFilter $filter) : array
    {
        $query = $this->createQueryBuilder('t');

            if($filter->ascDate ){
                $query = $query
                        ->orderBy('t.createAt', 'DESC');
            }
            if($filter->status){
                $query = $query
                        ->andWhere('t.status = :status')
                        ->setParameter('status', $filter->status );
            }
                $query =  $query->getQuery()->getResult();

        return  $query;
    }


    /*
    public function findOneBySomeField($value): ?Task
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
