<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Dog;


/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

	public function dogsByUser(){

		return $this->CreateQueryBuilder('user');
		            
				//->select('user.dogs');
					
	}
}
