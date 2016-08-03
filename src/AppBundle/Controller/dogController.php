<?php

/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 08/03/16
 * Time: 21:10
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class dogController extends Controller
{

    /**
     * @Route("/dog/index")
     */

    public function indexAction()
    {
        return $this->render('dog/index.html.twig');

    }

    /**
     * @Route("/dog/signUp")
     */

    public function signUpAction()
    {

        return $this->render('dog/signUp.html.twig');

    }

}