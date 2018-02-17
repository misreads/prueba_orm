<?php

namespace PersonaBundle\Controller;

use PersonaBundle\Entity\Perfil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Perfil controller.
 *
 * @Route("perfil")
 */
class PerfilController extends Controller
{
    /**
     * Lists all perfil entities.
     *
     * @Route("/", name="perfil_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $perfils = $em->getRepository('PersonaBundle:Perfil')->findAll();

        return $this->render('perfil/index.html.twig', array(
            'perfils' => $perfils,
        ));
    }

    /**
     * Creates a new perfil entity.
     *
     * @Route("/new", name="perfil_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $perfil = new Perfil();
        $perfil->setFechaCreacion();
        $perfil->setFechaModificacion();
        $form = $this->createForm('PersonaBundle\Form\PerfilType', $perfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($perfil);
            $em->flush();

            return $this->redirectToRoute('perfil_show', array('id' => $perfil->getId()));
        }

        return $this->render('perfil/new.html.twig', array(
            'perfil' => $perfil,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a perfil entity.
     *
     * @Route("/{id}", name="perfil_show")
     * @Method("GET")
     */
    public function showAction(Perfil $perfil)
    {
        $deleteForm = $this->createDeleteForm($perfil);

        return $this->render('perfil/show.html.twig', array(
            'perfil' => $perfil,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing perfil entity.
     *
     * @Route("/{id}/edit", name="perfil_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Perfil $perfil)
    {
        $deleteForm = $this->createDeleteForm($perfil);
        $editForm = $this->createForm('PersonaBundle\Form\PerfilType', $perfil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $perfil->setFechaModificacion();
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('perfil_edit', array('id' => $perfil->getId()));
        }

        return $this->render('perfil/edit.html.twig', array(
            'perfil' => $perfil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a perfil entity.
     *
     * @Route("/{id}", name="perfil_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Perfil $perfil)
    {
        $form = $this->createDeleteForm($perfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($perfil);
            $em->flush();
        }

        return $this->redirectToRoute('perfil_index');
    }

    /**
     * Creates a form to delete a perfil entity.
     *
     * @param Perfil $perfil The perfil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Perfil $perfil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('perfil_delete', array('id' => $perfil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
