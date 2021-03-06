<?php

namespace App\Repository\Backend;

use App\Entity\Backend\Noticia;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Noticia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Noticia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Noticia[]    findAll()
 * @method Noticia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoticiaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry )
    {
        parent::__construct($registry, Noticia::class);
      
    }
   

    /* obtengo fecha actual de publicacion */
    
    // /**
    //  * @return Noticia[] Returns an array of Noticia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Noticia
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findNoticiasDestacadas()
    {
        $dtz = new \DateTimeZone("America/Argentina/Buenos_Aires");
        $dt = new \DateTime("now", $dtz);
        $fecha_publicacion = $dt->format("Y-m-d");
       
        return $this->createQueryBuilder('n')
            ->andWhere('n.tipo_noticia = :tipo')
            ->andWhere('n.publicado = TRUE')
            ->andWhere('n.fecha_publicacion = :fecha_publicacion')
            ->setParameter('tipo', 'Destacada')
            ->setParameter('fecha_publicacion',$fecha_publicacion)
            ->getQuery()
            ->getResult()
        ;
    }
    
}
