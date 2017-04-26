<?php

namespace Adverto\AdminBundle\Controller\JMP;

use Adverto\AdminBundle\Entity\JMP\Location;
use Adverto\AdminBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Location controller.
 *
 */
class LocationController extends BaseController {

    /**
     * Lists all location entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $this->view['locations'] = $em->getRepository('AdminBundle:JMP\Location')->findAll();
        return $this->_render('AdminBundle:JMP:Location\index.html.twig');
    }

    /**
     * Creates a new location entity.
     *
     */
    public function newAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $location = new Location();
        $form = $this->createForm('Adverto\AdminBundle\Form\JMP\LocationType', $location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $location->setUser($this->getUser());
            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('admin_jmp_location_show', array('id' => $location->getId()));
        }

        return $this->render('AdminBundle:JMP:Location/new.html.twig', array(
                    'location' => $location,
                    'countries' => $em->getRepository('AdminBundle:JMP\Country')->findAll(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a location entity.
     *
     */
    public function showAction(Location $location) {
        $deleteForm = $this->createDeleteForm($location);

        return $this->render('AdminBundle:jmp:location/show.html.twig', array(
                    'location' => $location,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing location entity.
     *
     */
    public function editAction(Request $request, Location $location) {
        $deleteForm = $this->createDeleteForm($location);
        $editForm = $this->createForm('Adverto\AdminBundle\Form\JMP\LocationType', $location);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_jmp_location_edit', array('id' => $location->getId()));
        }

        return $this->render('AdminBundle:jmp:location/edit.html.twig', array(
                    'location' => $location,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a location entity.
     *
     */
    public function deleteAction(Request $request, Location $location) {
        $form = $this->createDeleteForm($location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($location);
            $em->flush();
        }

        return $this->redirectToRoute('admin_jmp_location_index');
    }

    /**
     * Creates a form to delete a location entity.
     *
     * @param Location $location The location entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Location $location) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_jmp_location_delete', array('id' => $location->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
