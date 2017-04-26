<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\CareerLevel;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * CareerLevel controller.
 *
 */
class CareerLevelController extends BaseController {

    /**
     * Lists all careerLevel entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['careerlevels'] = $em->getRepository('AdminBundle:JMP\CareerLevel')->findAll();
        return $this->_render('AdminBundle:JMP:CareerLevel\index.html.twig');
    }

    /**
     * Creates a new careerLevel entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $careerLevel = new CareerLevel();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\CareerLevelType', $careerLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $careerLevel->setUser($this->getUser());
            $em->persist($careerLevel);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_career_level_show', array('id' => $careerLevel->getId()));
        }

        return $this->render('AdminBundle:JMP:CareerLevel/new.html.twig', array(
                    'careerLevel' => $careerLevel,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a careerLevel entity.
     *
     */
    public function showAction(CareerLevel $careerLevel) {
        $deleteForm = $this->createDeleteForm($careerLevel);

        return $this->render('AdminBundle:jmp:career_level/show.html.twig', array(
                    'careerLevel' => $careerLevel,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing careerLevel entity.
     *
     */
    public function editAction(Request $request, CareerLevel $careerLevel) {
        $deleteForm = $this->createDeleteForm($careerLevel);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\CareerLevelType', $careerLevel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_career_level_edit', array('id' => $careerLevel->getId()));
        }

        return $this->render('AdminBundle:jmp:career_level/edit.html.twig', array(
                    'careerLevel' => $careerLevel,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a careerLevel entity.
     *
     */
    public function deleteAction(Request $request, CareerLevel $careerLevel) {
        $form = $this->createDeleteForm($careerLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($careerLevel);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_career_level_index');
    }

    /**
     * Creates a form to delete a careerLevel entity.
     *
     * @param CareerLevel $careerLevel The careerLevel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CareerLevel $careerLevel) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_career_level_delete', array('id' => $careerLevel->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
