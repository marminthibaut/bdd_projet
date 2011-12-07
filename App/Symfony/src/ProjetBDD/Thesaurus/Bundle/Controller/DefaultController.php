<?php

namespace ProjetBDD\Thesaurus\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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

    /**
     * Displays a form to search en entity
     *
     * @Route("/search", name="ProjetBDDThesaurusBundle_search")
     * @Template()
     */
    public function searchAction($request)
    {

	$em = $this->getDoctrine()->getEntityManager();

        //$results = $em->getRepository('ProjetBDDThesaurusBundle:Concept')->findBy(array('terme_vedette' => $request));
	//$query = $em->createQuery("SELECT DISTINCT c FROM ProjetBDDThesaurusBundle:Concept c JOIN c.synonymes s WHERE c.terme_vedette = '$request' OR s.id = '$request'");

	$qb = $em->createQueryBuilder('ProjetBDDThesaurusBundle:Concept');
	$results = $qb->select('distinct c')
			 ->from('ProjetBDDThesaurusBundle:Concept','c')
			 ->leftJoin('c.terme_vedette', 'tv', 'WITH', 'tv.id = c.terme_vedette')
			 ->leftJoin('c.synonymes', 's')
			 ->where($qb->expr()->orx(
				$qb->expr()->like('tv.id',"'%$request%'"),
				$qb->expr()->like('s.id',"'%$request%'")
			 ))
			 ->getQuery()->getResult();

        return $this->container->get('templating')->renderResponse('ProjetBDDThesaurusBundle:Default:search.html.twig',
	    array('results' => $results,'request' => $request)
	  );
    }
}
