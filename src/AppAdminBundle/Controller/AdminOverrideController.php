<?php

namespace AppAdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Session\Session;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as EasyAdminController;


class AdminOverrideController  extends EasyAdminController
{


	public function createNewUsersEntity()
	{
		return $this->container->get('fos_user.user_manager')->createUser();
	}

	public function prePersistUsersEntity(User $user)
	{
		$this->container->get('fos_user.user_manager')->updateUser($user, false);
	}

	public function preUpdateUsersEntity(User $user)
	{
		$this->container->get('fos_user.user_manager')->updateUser($user, false);
	}

}