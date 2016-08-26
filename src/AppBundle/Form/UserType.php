<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserType extends AbstractType{

	public function buildForm(FormBuilderInterface $builder, array $options){

		$builder->add('username')
		        ->add('name')
				->add('surname')
				->add('email')
				->add('telephone');


	}

	public function setDefaultOptions(OptionsResolverInterface $resolver){

		$resolver->setDefaults( array('data_class' => 'AppBundle\Entity\User') ); 
	}

	public function getName() {

		return 'appBundle_user';
	}
}