<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\YearsOfExperience;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * YearsOfExperience controller.
 *
 */
class YearsOfExperienceController extends BaseController {

    /**
     * Lists all yearsOfExperience entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['yearsofexperiences'] = $em->getRepository('AdminBundle:JMP\YearsOfExperience')->findAll();
        return $this->_render('AdminBundle:JMP:YearsOfExperience\index.html.twig');
    }

    /**
     * Creates a new yearsOfExperience entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $yearsOfExperience = new YearsOfExperience();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\YearsOfExperienceType', $yearsOfExperience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $yearsOfExperience->setUser($this->getUser());
            $em->persist($yearsOfExperience);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_years_of_experience_show', array('id' => $yearsOfExperience->getId()));
        }

        return $this->render('AdminBundle:JMP:YearsOfExperience/new.html.twig', array(
                    'yearsOfExperience' => $yearsOfExperience,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a yearsOfExperience entity.
     *
     */
    public function showAction(YearsOfExperience $yearsOfExperience) {
        $deleteForm = $this->createDeleteForm($yearsOfExperience);

        return $this->render('AdminBundle:jmp:years_of_experience/show.html.twig', array(
                    'yearsOfExperience' => $yearsOfExperience,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing yearsOfExperience entity.
     *
     */
    public function editAction(Request $request, YearsOfExperience $yearsOfExperience) {
        $deleteForm = $this->createDeleteForm($yearsOfExperience);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\YearsOfExperienceType', $yearsOfExperience);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_years_of_experience_edit', array('id' => $yearsOfExperience->getId()));
        }

        return $this->render('AdminBundle:jmp:years_of_experience/edit.html.twig', array(
                    'yearsOfExperience' => $yearsOfExperience,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a yearsOfExperience entity.
     *
     */
    public function deleteAction(Request $request, YearsOfExperience $yearsOfExperience) {
        $form = $this->createDeleteForm($yearsOfExperience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($yearsOfExperience);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_years_of_experience_index');
    }

    /**
     * Creates a form to delete a yearsOfExperience entity.
     *
     * @param YearsOfExperience $yearsOfExperience The yearsOfExperience entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(YearsOfExperience $yearsOfExperience) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_years_of_experience_delete', array('id' => $yearsOfExperience->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
