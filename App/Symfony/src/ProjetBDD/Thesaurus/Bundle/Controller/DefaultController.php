<?php

namespace ProjetBDD\Thesaurus\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
	$message = "bonjour !";
//        return $this->render('ProjetBDDThesaurusBundle:Default:index.html.twig', array('name' => $name));

	return $this->container->get('templating')->renderResponse('ProjetBDDThesaurusBundle:Default:index.html.twig',
	    array('message' => $message)
	  );	
    }
}
