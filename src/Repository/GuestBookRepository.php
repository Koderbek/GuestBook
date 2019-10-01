<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 01.10.2019
 * Time: 7:23
 */

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class GuestBookRepository extends EntityRepository
{
    public function findByFilter(array $filterArray)
    {
        $type = key_exists('filter', $filterArray) ? $filterArray['filter'] : null;
        $sort = key_exists('sort', $filterArray) ? $filterArray['sort'] : null;

        $qb = $this->createQueryBuilder('guestBook');
        if ($type && $sort) {
            $qb->orderBy('guestBook.'.$type, $sort);
        }

        return $qb->getQuery()->getResult();
    }
}