<?php
namespace App\Repository;
use App\Entity\Title;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method Title|null find($id, $lockMode = null, $lockVersion = null)
 * @method Title|null findOneBy(array $criteria, array $orderBy = null)
 * @method Title[]    findAll()
 * @method Title[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Title::class);
    }

    public function findSubmitted() {
        $qb = $this
            ->createQueryBuilder('t')
            ->where('t.submittedBy IS NOT NULL')
            ->getQuery()
        ;

        return $qb->execute();
    }
   
    public function findMaxId() :int {
       
        return $this
                ->createQueryBuilder('t')
                ->select('MAX(t.id)')
                ->getQuery()
                ->getSingleScalarResult()
                ;
   }
}