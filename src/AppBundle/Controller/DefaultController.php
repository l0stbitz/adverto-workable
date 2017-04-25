<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Adverto\AdminBundle\Service\RedisService as CS;

class DefaultController extends BaseController {

    public function indexAction(Request $request) {
        $mobileDetector = $this->get('mobile_detect.mobile_detector');
        $mobile = $mobileDetector->isMobile() || $mobileDetector->isTablet();
        return $this->_render($mobile ? 'AppBundle:Mobile:index.html.twig' : 'AppBundle:Default:index.html.twig');
    }

    public function jobAction(Request $request, $title = "", $id = 0) {
        $wrkSrv = $this->container->get('admin.workable_service');

        $this->view['job'] = $wrkSrv->getJobFromRedis($id);

        $this->view['job']->titleDisplay = $this->view['job']->title;
        $this->view['job']->category = $this->view['job']->industry;
        $this->view['job']->categoryDisplay = $this->view['job']->industry;
        if (is_object($this->view['job']->location)) {
            $loc = $this->view['job']->location->city . ', ' . $this->view['job']->location->region_code;
            $this->view['job']->location = $loc; //
            $this->view['job']->locationDisplay = $loc; //
        } else {
            $this->view['job']->location = ""; //
            $this->view['job']->locationDisplay = ""; //
        }
        $this->view['job']->url = "/job-details/" . urlencode($this->view['job']->title) . "/" . $this->view['job']->id; //

        $mobileDetector = $this->get('mobile_detect.mobile_detector');
        $mobile = $mobileDetector->isMobile() || $mobileDetector->isTablet();
        return $this->_render($mobile ? 'AppBundle:Mobile:jobdetail.html.twig' : 'AppBundle:Default:jobdetail.html.twig');
    }

}
