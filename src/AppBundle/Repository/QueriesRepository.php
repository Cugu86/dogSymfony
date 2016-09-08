<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class QueriesRepository extends EntityRepository
{

	public function dogByUserQuery($repo){

		return $this->createQueryBuilder('booking')
			        ->orderBy('booking.dogs', 'ASC');
	}
}