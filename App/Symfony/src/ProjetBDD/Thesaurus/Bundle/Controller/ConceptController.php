<?php

namespace ProjetBDD\Thesaurus\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ProjetBDD\Thesaurus\Bundle\Entity\Concept;
use ProjetBDD\Thesaurus\Bundle\Form\ConceptType;

/**
 * Concept controller.
 *
 * @Route("/concept")
 */
class ConceptController extends Controller
{
    /**
     * Lists all Concept entities.
     *
     * @Route("/", name="concept")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $roots = $em->getRepository('ProjetBDDThesaurusBundle:Concept')->findBy(array('concept_general' => NULL));

        $i = 0;
	$tab = array();
	$this->haborescence($roots,$i,$tab);

        return array('tab' => $tab);
    }

    private function haborescence($roots,$i,&$tab){
        foreach($roots as $r){
            array_push($tab,array('entity' => $r, 'rang' => $i));
            $this->haborescence($r->getConceptsSpecifiques(),$i+3,$tab);
        }
    }

    /**
     * Finds and displays a Concept entity.
     *
     * @Route("/{id}/show", name="concept_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetBDDThesaurusBundle:Concept')->find($id);

        if (!$entity) {
	    $this->get('session')->setFlash('error', 'Concept introuvable.'); 
            return $this->redirect($this->generateUrl('concept'));
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Concept entity.
     *
     * @Route("/new", name="concept_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Concept();
        $form   = $this->createForm(new ConceptType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Concept entity.
     *
     * @Route("/create", name="concept_create")
     * @Method("post")
     * @Template("ProjetBDDThesaurusBundle:Concept:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Concept();
        $request = $this->getRequest();
        $form    = $this->createForm(new ConceptType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

	    $this->get('session')->setFlash('notice', 'Concept ajouté.'); 
            return $this->redirect($this->generateUrl('concept_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Concept entity.
     *
     * @Route("/{id}/edit", name="concept_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetBDDThesaurusBundle:Concept')->find($id);

        if (!$entity) {
	    $this->get('session')->setFlash('error', 'Concept introuvable.'); 
            return $this->redirect($this->generateUrl('concept'));
        }

        $editForm = $this->createForm(new ConceptType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Concept entity.
     *
     * @Route("/{id}/update", name="concept_update")
     * @Method("post")
     * @Template("ProjetBDDThesaurusBundle:Concept:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetBDDThesaurusBundle:Concept')->find($id);

        if (!$entity) {
	    $this->get('session')->setFlash('error', 'Concept introuvable.'); 
            return $this->redirect($this->generateUrl('concept'));
        }

        $editForm   = $this->createForm(new ConceptType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
	    if($this->boucle($entity->getConceptGeneral(),$entity)) $this->get('session')->setFlash('error', 'L\'affectation de ce parent crée une boucle dans la hiérarchie.');
	    else{
	    $this->get('session')->setFlash('notice', 'Modification enregistrées.');
            $em->persist($entity);
            $em->flush();
	    }

            return $this->redirect($this->generateUrl('concept_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    private function boucle($e1,&$e2){
        if($e1 === NULL) return false;
	else if($e1 === $e2) return true;
	else return $this->boucle($e1->getConceptGeneral(),$e2);
    }

    /**
     * Deletes a Concept entity.
     *
     * @Route("/{id}/delete", name="concept_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetBDDThesaurusBundle:Concept')->find($id);

            if (!$entity) {
	       $this->get('session')->setFlash('error', 'Concept introuvable.'); 
            }
	    try{
                $em->remove($entity);
                $em->flush();
                $this->get('session')->setFlash('notice', 'Concept supprimé.');
	    }catch(\Exception $e){
	       $this->get('session')->setFlash('error', 'Erreur lors de la suppression : ce concept possède des fils. ('.$e->getMessage().').'); 
               return $this->redirect($this->generateUrl('concept_show', array('id' => $id)));
	    }
        }

        return $this->redirect($this->generateUrl('concept'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
