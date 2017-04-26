<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\JobType;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * JobType controller.
 *
 */
class JobTypeController extends BaseController {

    /**
     * Lists all JobType entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['jobtypes'] = $em->getRepository('AdminBundle:JMP\JobType')->findAll();
        return $this->_render('AdminBundle:JMP:JobType\index.html.twig');
    }

    /**
     * Creates a new JobType entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $jobType = new JobType();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\JobTypeType', $jobType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jobType->setUser($this->getUser());
            $em->persist($jobType);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_job_type_show', array('id' => $jobType->getId()));
        }

        return $this->render('AdminBundle:JMP:JobType/new.html.twig', array(
                    'JobType' => $jobType,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a JobType entity.
     *
     */
    public function showAction(JobType $jobType) {
        $deleteForm = $this->createDeleteForm($jobType);

        return $this->render('AdminBundle:jmp:JobType/show.html.twig', array(
                    'JobType' => $jobType,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing JobType entity.
     *
     */
    public function editAction(Request $request, JobType $jobType) {
        $deleteForm = $this->createDeleteForm($jobType);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\JobTypeType', $jobType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_job_type_edit', array('id' => $jobType->getId()));
        }

        return $this->render('AdminBundle:jmp:JobType/edit.html.twig', array(
                    'JobType' => $jobType,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a JobType entity.
     *
     */
    public function deleteAction(Request $request, JobType $jobType) {
        $form = $this->createDeleteForm($jobType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jobType);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_job_type_index');
    }

    /**
     * Creates a form to delete a JobType entity.
     *
     * @param JobType $jobType The JobType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(JobType $jobType) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_job_type_delete', array('id' => $jobType->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
