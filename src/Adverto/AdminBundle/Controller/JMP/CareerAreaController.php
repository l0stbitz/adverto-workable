<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\CareerArea;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * CareerArea controller.
 *
 */
class CareerAreaController extends BaseController {

    /**
     * Lists all careerArea entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['careerareas'] = $em->getRepository('AdminBundle:JMP\CareerArea')->findAll();
        return $this->_render('AdminBundle:JMP:CareerArea\index.html.twig');
    }

    /**
     * Creates a new careerArea entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $careerArea = new CareerArea();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\CareerAreaType', $careerArea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $careerArea->setUser($this->getUser());
            $em->persist($careerArea);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_career_area_show', array('id' => $careerArea->getId()));
        }

        return $this->render('AdminBundle:JMP:CareerArea/new.html.twig', array(
                    'careerArea' => $careerArea,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a careerArea entity.
     *
     */
    public function showAction(CareerArea $careerArea) {
        $deleteForm = $this->createDeleteForm($careerArea);

        return $this->render('AdminBundle:jmp:CareerArea/show.html.twig', array(
                    'careerArea' => $careerArea,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing careerArea entity.
     *
     */
    public function editAction(Request $request, CareerArea $careerArea) {
        $deleteForm = $this->createDeleteForm($careerArea);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\CareerAreaType', $careerArea);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_career_area_edit', array('id' => $careerArea->getId()));
        }

        return $this->render('AdminBundle:jmp:CareerArea/edit.html.twig', array(
                    'careerArea' => $careerArea,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a careerArea entity.
     *
     */
    public function deleteAction(Request $request, CareerArea $careerArea) {
        $form = $this->createDeleteForm($careerArea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($careerArea);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_career_area_index');
    }

    /**
     * Creates a form to delete a careerArea entity.
     *
     * @param CareerArea $careerArea The careerArea entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CareerArea $careerArea) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_career_area_delete', array('id' => $careerArea->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
