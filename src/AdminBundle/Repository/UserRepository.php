<?php
namespace AdminBundle\Repository;

class UserRepository extends \Doctrine\ORM\EntityRepository{
    /**
     * 倒序遍历表
     */
    public function getPageQuery()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
}