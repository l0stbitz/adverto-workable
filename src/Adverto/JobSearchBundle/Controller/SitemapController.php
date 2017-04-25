<?php

namespace Adverto\JobSearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Adverto\AdminBundle\Service\RedisService as CS;

class SitemapController extends Controller {

    // @TODO: Put proper values once db is populated
    public function indeedAction() {
        $this->redis = $this->container->get('admin.redis_service');
        $key = 'adverto:jobs:*';
        $jobs = $this->redis->getAll($key);
        $response = new Response ($this->renderView('JobSearchBundle:Default:indeed.xml.twig',['jobs'=>$jobs]));
        $response->headers->set('Content-Type', 'application/xml; charset=utf-8');
        return $response;
    }
}
