<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\JobStatus;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * JobStatus controller.
 *
 */
class JobStatusController extends BaseController {

    /**
     * Lists all jobStatus entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['jobstatuses'] = $em->getRepository('AdminBundle:JMP\JobStatus')->findAll();
        return $this->_render('AdminBundle:JMP:JobStatus\index.html.twig');
    }

    /**
     * Creates a new jobStatus entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $jobStatus = new JobStatus();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\JobStatusType', $jobStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jobStatus->setUser($this->getUser());
            $em->persist($jobStatus);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_job_status_show', array('id' => $jobStatus->getId()));
        }

        return $this->render('AdminBundle:JMP:JobStatus/new.html.twig', array(
                    'jobStatus' => $jobStatus,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jobStatus entity.
     *
     */
    public function showAction(JobStatus $jobStatus) {
        $deleteForm = $this->createDeleteForm($jobStatus);

        return $this->render('AdminBundle:jmp:job_status/show.html.twig', array(
                    'jobStatus' => $jobStatus,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jobStatus entity.
     *
     */
    public function editAction(Request $request, JobStatus $jobStatus) {
        $deleteForm = $this->createDeleteForm($jobStatus);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\JobStatusType', $jobStatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_job_status_edit', array('id' => $jobStatus->getId()));
        }

        return $this->render('AdminBundle:jmp:job_status/edit.html.twig', array(
                    'jobStatus' => $jobStatus,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jobStatus entity.
     *
     */
    public function deleteAction(Request $request, JobStatus $jobStatus) {
        $form = $this->createDeleteForm($jobStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jobStatus);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_job_status_index');
    }

    /**
     * Creates a form to delete a jobStatus entity.
     *
     * @param JobStatus $jobStatus The jobStatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(JobStatus $jobStatus) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_job_status_delete', array('id' => $jobStatus->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
