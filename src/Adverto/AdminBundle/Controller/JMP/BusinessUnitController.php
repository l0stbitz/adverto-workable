<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\BusinessUnit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * BusinessUnit controller.
 *
 */
class BusinessUnitController extends Controller {

    /**
     * Lists all businessUnit entities.
     *
     */
    public function indexAction() {

        return $this->_render('AdminBundle:JMP:BusinessUnit\index.html.twig');
    }

    /**
     * Creates a new businessUnit entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $businessUnit = new BusinessUnit();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\BusinessUnitType', $businessUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $businessUnit->setUser($this->getUser());
            $em->persist($businessUnit);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_business_unit_show', array('id' => $businessUnit->getId()));
        }

        return $this->render('AdminBundle:JMP:BusinessUnit/new.html.twig', array(
                    'businessUnit' => $businessUnit,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a businessUnit entity.
     *
     */
    public function showAction(BusinessUnit $businessUnit) {
        $deleteForm = $this->createDeleteForm($businessUnit);

        return $this->render('AdminBundle:jmp:business_unit/show.html.twig', array(
                    'businessUnit' => $businessUnit,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing businessUnit entity.
     *
     */
    public function editAction(Request $request, BusinessUnit $businessUnit) {
        $deleteForm = $this->createDeleteForm($businessUnit);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\BusinessUnitType', $businessUnit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_business_unit_edit', array('id' => $businessUnit->getId()));
        }

        return $this->render('AdminBundle:jmp:business_unit/edit.html.twig', array(
                    'businessUnit' => $businessUnit,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a businessUnit entity.
     *
     */
    public function deleteAction(Request $request, BusinessUnit $businessUnit) {
        $form = $this->createDeleteForm($businessUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($businessUnit);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_business_unit_index');
    }

    /**
     * Creates a form to delete a businessUnit entity.
     *
     * @param BusinessUnit $businessUnit The businessUnit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BusinessUnit $businessUnit) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_business_unit_delete', array('id' => $businessUnit->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
