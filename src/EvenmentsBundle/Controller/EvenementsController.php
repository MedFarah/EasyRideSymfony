<?php

namespace EvenmentsBundle\Controller;

use EvenmentsBundle\Entity\evenements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Evenement controller.
 *
 * @Route("evenements")
 */
class EvenementsController extends Controller
{
    /**
     * Lists all evenement entities.
     *
     * @Route("/index", name="evenements_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('EvenmentsBundle:evenements')->findAll();

        return $this->render('@Evenments/evenements/index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Creates a new evenement entity.
     *
     * @Route("/new", name="evenements_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evenement = new evenements();
        $form = $this->createForm('EvenmentsBundle\Form\EvenementsType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('evenements_show', array('id' => $evenement->getId()));
        }

        return $this->render('@Evenments/evenements/new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evenement entity.
     *
     * @Route("/{id}", name="evenements_show")
     * @Method("GET")
     */
    public function showAction(Evenements $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('@Evenments/evenements/show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Route("/{id}/edit", name="evenements_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evenements $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('EvenmentsBundle\Form\EvenementsType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenements_edit', array('id' => $evenement->getId()));
        }

        return $this->render('@Evenments/evenements/edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evenement entity.
     *
     * @Route("/{id}", name="evenements_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Evenements $evenement)
    {
        $form = $this->createDeleteForm($evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenement);
            $em->flush();
        }

        return $this->redirectToRoute('evenements_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenements $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenements $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenements_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
