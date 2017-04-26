<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Job controller.
 *
 */
class JobController extends Controller {

    /**
     * Lists all job entities.
     *
     */
    public function indexAction() {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $em = $this->getDoctrine()->getManager();
        $data = [];
        $jobs = $em->getRepository('AdminBundle:JMP\Job')->findAll();
        foreach ($jobs as $job) {
            $job->setUser(null);
            $data[] = json_decode($serializer->serialize($job, 'json'));
        }
        $response = new JsonResponse($data);
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }

    /**
     * Creates a new job entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $job = new Job();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\JobType', $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $job->setUser($this->getUser());
            $job->setIpAddress($request->getClientIp());
            
            $em->persist($job);
            $em->flush();

            return $this->redirectToRoute('admin_job_show', array('id' => $job->getId()));
        }

        return $this->render('AdminBundle:JMP:Job/new.html.twig', array(
                    'job' => $job,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a job entity.
     *
     */
    public function showAction(Job $job) {
        $deleteForm = $this->createDeleteForm($job);

        return $this->render('AdminBundle:jmp:job/show.html.twig', array(
                    'job' => $job,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing job entity.
     *
     */
    public function editAction(Request $request, Job $job) {
        $deleteForm = $this->createDeleteForm($job);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\JobType', $job);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_job_edit', array('id' => $job->getId()));
        }

        return $this->render('AdminBundle:jmp:job/edit.html.twig', array(
                    'job' => $job,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a job entity.
     *
     */
    public function deleteAction(Request $request, Job $job) {
        $form = $this->createDeleteForm($job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush();
        }

        return $this->redirectToRoute('admin_job_index');
    }

    /**
     * Creates a form to delete a job entity.
     *
     * @param Job $job The job entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Job $job) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_job_delete', array('id' => $job->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
