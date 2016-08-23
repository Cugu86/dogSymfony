<?php

/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 08/03/16
 * Time: 21:10
 */

namespace AppBundle\Controller;

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

class dogController extends Controller
{

    /**
     * @Route("/index" )
     */

    public function indexAction(Request $request)
    {
        
        $contact = new Contact();
        $form = $this-> createFormbuilder($contact)

            ->add('name', TextType::Class, array('attr'=> array('class'=> 'form-control','style'=> 'margin-bottom: 15px')))
            ->add('email', TextType::Class, array('attr'=> array('class'=> 'form-control','style'=> 'margin-bottom: 15px')))
            ->add('telephone', TextType::Class, array('attr'=> array('class'=> 'form-control','style'=> 'margin-bottom: 15px')))
            ->add('message', TextareaType::Class, array('attr'=> array('class'=> 'form-control','style'=> 'margin-bottom: 15px')))
             ->add('submit', SubmitType::Class, array('attr'=> array('class'=> 'btn btn-default','style'=> 'margin-bottom: 15px')))
             ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $name = $form['name']->getData();
            $email = $form['email']->getData();
            $telephone = $form['telephone']->getData();
            $message1 = $form['message']->getData();

            $contact->setName($name);
            $contact->setEmail($email);
            $contact->setTelephone($telephone);
            $contact->setMessage($message1);
          

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->addFlash(

                'notice',
                'Contact Sent'
            );


            //sending the mail to the commerce
             $message = \Swift_Message::newInstance()
            ->setSubject('Hello '. $name. ' sent a contact request')
            ->setFrom($email)
            ->setTo('lacugurra@gmail.com')
            ->setBody( $message1, 'text/html');
            $this->get('mailer')->send($message);

            return $this->render('dog/index.html.twig',array('form'=>$form->createView()));
        }

        return $this->render('dog/index.html.twig',array('form'=>$form->createView()));

    }


    /**
     * @Route("/dog/list", name= "dog_list"  ) 
     */

    public function contactAction()
    {
        //render the contact request 
        $contacts = $this->getDoctrine()->getRepository('AppBundle:contact')->findAll();
        
        return $this->render('dog/list.html.twig', array(
            'contacts'=> $contacts
        ));
    }

    /**
     * @Route("/admin/", name= "admin"  ) 
     */

    public function adminAction()
    {
        return $this->render('dog/admin.html.twig');
    }

    /**
     * @Route("/profile/", name= "profile"  ) 
     */

    public function profileAction()
    {
        return $this->render('dog/profile.html.twig');
    }


}