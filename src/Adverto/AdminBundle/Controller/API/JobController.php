<?php

namespace Adverto\AdminBundle\Controller\API;

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

}
