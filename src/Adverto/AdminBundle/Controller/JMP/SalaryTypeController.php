<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\SalaryType;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * SalaryType controller.
 *
 */
class SalaryTypeController extends BaseController {

    /**
     * Lists all salaryType entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['salarytypes'] = $em->getRepository('AdminBundle:JMP\SalaryType')->findAll();
        return $this->_render('AdminBundle:JMP:SalaryType\index.html.twig');
    }

    /**
     * Creates a new salaryType entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $salaryType = new SalaryType();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\SalaryTypeType', $salaryType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salaryType->setUser($this->getUser());
            $em->persist($salaryType);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_salary_type_show', array('id' => $salaryType->getId()));
        }

        return $this->render('AdminBundle:JMP:SalaryType/new.html.twig', array(
                    'salaryType' => $salaryType,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a salaryType entity.
     *
     */
    public function showAction(SalaryType $salaryType) {
        $deleteForm = $this->createDeleteForm($salaryType);

        return $this->render('AdminBundle:jmp:salary_type/show.html.twig', array(
                    'salaryType' => $salaryType,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing salaryType entity.
     *
     */
    public function editAction(Request $request, SalaryType $salaryType) {
        $deleteForm = $this->createDeleteForm($salaryType);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\SalaryTypeType', $salaryType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_salary_type_edit', array('id' => $salaryType->getId()));
        }

        return $this->render('AdminBundle:jmp:salary_type/edit.html.twig', array(
                    'salaryType' => $salaryType,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a salaryType entity.
     *
     */
    public function deleteAction(Request $request, SalaryType $salaryType) {
        $form = $this->createDeleteForm($salaryType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($salaryType);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_salary_type_index');
    }

    /**
     * Creates a form to delete a salaryType entity.
     *
     * @param SalaryType $salaryType The salaryType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SalaryType $salaryType) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_salary_type_delete', array('id' => $salaryType->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
