<?php

namespace App\Repository;


use App\Entity\Department;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DepartmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Department::class);
    }

    public function add(Department $department, bool $flush= false)
    {
        $this->_em->persist($department);
        $this->_em->flush();
    }

    public function list()
    {
       return $this->_em->createQueryBuilder()
           ->from(Department::class,"dep")
           ->select("dep")
           ->getQuery()
           ->getArrayResult();
    }

    public function select($id)
    {
        return $this->_em->createQueryBuilder()
            ->from(Department::class,"dep")
            ->select("dep")
            ->where("dep.id=:id")
            ->setParameter("id",$id)
            ->getQuery()
            ->getArrayResult();
    }
}