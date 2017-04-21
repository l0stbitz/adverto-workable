<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Adverto\AdminBundle\Service\RedisService as CS;

class DefaultController extends BaseController {

    public function indexAction(Request $request) {
        return $this->_render('AppBundle:Default:index.html.twig');
    }

    public function jobAction(Request $request, $title = "", $id = 0) {
        $wrkSrv = $this->container->get('admin.workable_service');

        $this->view['job'] = $wrkSrv->getJobFromRedis($id);

        $this->view['job']->titleDisplay = $this->view['job']->title;
        $this->view['job']->category = ""; // $jobs['jobs'][$x]->department;
        $this->view['job']->categoryDisplay = "";
        $this->view['job']->location = ""; //
        $this->view['job']->locationDisplay = ""; //
        $this->view['job']->url = "/job-details/" . urlencode($this->view['job']->title) . "/" . $this->view['job']->id; //


        return $this->_render('AppBundle:Default:jobdetail.html.twig');
    }

}
