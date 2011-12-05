<?php

namespace ProjetBDD\Thesaurus\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ProjetBDD\Thesaurus\Bundle\Entity\Terme;
use ProjetBDD\Thesaurus\Bundle\Form\TermeType;

/**
 * Terme controller.
 *
 * @Route("/terme")
 */
class TermeController extends Controller
{
    /**
     * Lists all Terme entities.
     *
     * @Route("/", name="terme")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetBDDThesaurusBundle:Terme')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Terme entity.
     *
     * @Route("/{id}/show", name="terme_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetBDDThesaurusBundle:Terme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Terme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Terme entity.
     *
     * @Route("/new", name="terme_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Terme();
        $form   = $this->createForm(new TermeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Terme entity.
     *
     * @Route("/create", name="terme_create")
     * @Method("post")
     * @Template("ProjetBDDThesaurusBundle:Terme:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Terme();
        $request = $this->getRequest();
        $form    = $this->createForm(new TermeType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('terme_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Terme entity.
     *
     * @Route("/{id}/edit", name="terme_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetBDDThesaurusBundle:Terme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Terme entity.');
        }

        $editForm = $this->createForm(new TermeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Terme entity.
     *
     * @Route("/{id}/update", name="terme_update")
     * @Method("post")
     * @Template("ProjetBDDThesaurusBundle:Terme:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetBDDThesaurusBundle:Terme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Terme entity.');
        }

        $editForm   = $this->createForm(new TermeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('terme_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Terme entity.
     *
     * @Route("/{id}/delete", name="terme_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetBDDThesaurusBundle:Terme')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Terme entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('terme'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}