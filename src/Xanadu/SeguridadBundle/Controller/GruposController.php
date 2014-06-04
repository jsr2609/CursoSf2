<?php

namespace Xanadu\SeguridadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Xanadu\SeguridadBundle\Entity\Grupos;
use Xanadu\SeguridadBundle\Form\GruposType;

/**
 * Grupos controller.
 *
 */
class GruposController extends Controller
{

    /**
     * Lists all Grupos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('XanaduSeguridadBundle:Grupos')->findAll();

        return $this->render('XanaduSeguridadBundle:Grupos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Grupos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Grupos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('seguridad_grupos_show', array('id' => $entity->getId())));
        }

        return $this->render('XanaduSeguridadBundle:Grupos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Grupos entity.
    *
    * @param Grupos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Grupos $entity)
    {
        $form = $this->createForm(new GruposType(), $entity, array(
            'action' => $this->generateUrl('seguridad_grupos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Grupos entity.
     *
     */
    public function newAction()
    {
        $entity = new Grupos();
        $form   = $this->createCreateForm($entity);

        return $this->render('XanaduSeguridadBundle:Grupos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Grupos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XanaduSeguridadBundle:Grupos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XanaduSeguridadBundle:Grupos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Grupos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XanaduSeguridadBundle:Grupos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XanaduSeguridadBundle:Grupos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Grupos entity.
    *
    * @param Grupos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Grupos $entity)
    {
        $form = $this->createForm(new GruposType(), $entity, array(
            'action' => $this->generateUrl('seguridad_grupos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Grupos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XanaduSeguridadBundle:Grupos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('seguridad_grupos_edit', array('id' => $id)));
        }

        return $this->render('XanaduSeguridadBundle:Grupos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Grupos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('XanaduSeguridadBundle:Grupos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Grupos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('seguridad_grupos'));
    }

    /**
     * Creates a form to delete a Grupos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seguridad_grupos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
