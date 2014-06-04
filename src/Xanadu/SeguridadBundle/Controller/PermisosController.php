<?php

namespace Xanadu\SeguridadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Xanadu\SeguridadBundle\Entity\Permisos;
use Xanadu\SeguridadBundle\Form\PermisosType;

/**
 * Permisos controller.
 *
 */
class PermisosController extends Controller
{

    /**
     * Lists all Permisos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('XanaduSeguridadBundle:Permisos')->findAll();

        return $this->render('XanaduSeguridadBundle:Permisos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Permisos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Permisos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('seguridad_permisos_show', array('id' => $entity->getId())));
        }

        return $this->render('XanaduSeguridadBundle:Permisos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Permisos entity.
    *
    * @param Permisos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Permisos $entity)
    {
        $form = $this->createForm(new PermisosType(), $entity, array(
            'action' => $this->generateUrl('seguridad_permisos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Permisos entity.
     *
     */
    public function newAction()
    {
        $entity = new Permisos();
        $form   = $this->createCreateForm($entity);

        return $this->render('XanaduSeguridadBundle:Permisos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Permisos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XanaduSeguridadBundle:Permisos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Permisos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XanaduSeguridadBundle:Permisos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Permisos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XanaduSeguridadBundle:Permisos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Permisos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XanaduSeguridadBundle:Permisos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Permisos entity.
    *
    * @param Permisos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Permisos $entity)
    {
        $form = $this->createForm(new PermisosType(), $entity, array(
            'action' => $this->generateUrl('seguridad_permisos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Permisos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XanaduSeguridadBundle:Permisos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Permisos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('seguridad_permisos_edit', array('id' => $id)));
        }

        return $this->render('XanaduSeguridadBundle:Permisos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Permisos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('XanaduSeguridadBundle:Permisos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Permisos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('seguridad_permisos'));
    }

    /**
     * Creates a form to delete a Permisos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seguridad_permisos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
