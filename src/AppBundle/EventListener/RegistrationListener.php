<?php

// Give a default role user to the registration user

namespace AppBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use FOS\UserBundle\Event\UserEvent;


class RegistrationListener implements EventSubscriberInterface
{
	public static function getSubscribedEvents() {
		return array(

			FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'

			);
	}

	public function onRegistrationSuccess(FormEvent $event){
		$roles= array('ROLE_USER');
		$user = $event ->getForm()->getData();
		$user->setRoles($roles);
	}
}

