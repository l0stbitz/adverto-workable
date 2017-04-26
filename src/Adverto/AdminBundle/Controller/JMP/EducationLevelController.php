<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\EducationLevel;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * EducationLevel controller.
 *
 */
class EducationLevelController extends BaseController {

    /**
     * Lists all educationLevel entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['educationlevels'] = $em->getRepository('AdminBundle:JMP\EducationLevel')->findAll();
        return $this->_render('AdminBundle:JMP:EducationLevel\index.html.twig');
    }

    /**
     * Creates a new educationLevel entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $educationLevel = new EducationLevel();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\EducationLevelType', $educationLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $educationLevel->setUser($this->getUser());
            $em->persist($educationLevel);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_education_level_show', array('id' => $educationLevel->getId()));
        }

        return $this->render('AdminBundle:JMP:EducationLevel/new.html.twig', array(
                    'educationLevel' => $educationLevel,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a educationLevel entity.
     *
     */
    public function showAction(EducationLevel $educationLevel) {
        $deleteForm = $this->createDeleteForm($educationLevel);

        return $this->render('AdminBundle:jmp:education_level/show.html.twig', array(
                    'educationLevel' => $educationLevel,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing educationLevel entity.
     *
     */
    public function editAction(Request $request, EducationLevel $educationLevel) {
        $deleteForm = $this->createDeleteForm($educationLevel);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\EducationLevelType', $educationLevel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_education_level_edit', array('id' => $educationLevel->getId()));
        }

        return $this->render('AdminBundle:jmp:education_level/edit.html.twig', array(
                    'educationLevel' => $educationLevel,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a educationLevel entity.
     *
     */
    public function deleteAction(Request $request, EducationLevel $educationLevel) {
        $form = $this->createDeleteForm($educationLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($educationLevel);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_education_level_index');
    }

    /**
     * Creates a form to delete a educationLevel entity.
     *
     * @param EducationLevel $educationLevel The educationLevel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EducationLevel $educationLevel) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_education_level_delete', array('id' => $educationLevel->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
