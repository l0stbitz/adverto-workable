<?php

namespace Adverto\JobSearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Adverto\AdminBundle\Service\RedisService as CS;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('JobSearchBundle:Default:index.html.twig');
    }

    public function filteringAction() {
        $this->redis = $this->container->get('admin.redis_service');
        $categories = [];
        $locations = [];
        $key = 'adverto:jobs:*';
        $rJobs = $this->redis->getAll($key);
        for ($x = 0; $x < count($rJobs); $x++) {
            if (!isset($categories[$rJobs[$x]->industry]))
                $categories[$rJobs[$x]->industry] = ["value" => 0, "text" => $rJobs[$x]->industry];
            $categories[$rJobs[$x]->industry]['value'] ++;
            if (is_object($rJobs[$x]->location)) {
                $loc = $rJobs[$x]->location->city . ',' . $rJobs[$x]->location->region_code;
                if (!isset($locations[$loc]))
                    $locations[$loc] = ["value" => 0, "text" => $loc];
                $locations[$loc]['value'] ++;
            }
        }
        $cats = [];

        foreach ($categories as $category) {
            $cat = $category;
            $cat["text"] = $cat["text"] . " (" . $cat["value"] . ")";
            $cats[] = $cat;
        }
        array_unshift($cats, ["value" => "All Job Categories", "text" => "All Job Categories (" . count($rJobs) . ")"]);
        $locs = [];
        foreach ($locations as $location) {
            $loc = $location;
            $loc["text"] = $loc["text"] . " (" . $loc["value"] . ")";
            $locs[] = $loc;
        }
        array_unshift($locs, ["value" => "All Job Locations", "text" => "All Job Locations (" . count($rJobs) . ")"]);
        $res = ['categories' => $cats, 'locations' => $locs];

        $response = new JsonResponse($res); //json_decode('{"categories":[{"value":"All Job Categories","text":"All Job Categories (3)"},{"value":"3","text":"Web Development (3)"}],"locations":[{"value":"All Job Locations","text":"All Job Locations (3)"},{"value":"S::QC","text":"QC (3)"},{"value":"C::Montreal!*!QC","text":"&nbsp;&nbsp;&nbsp;Montreal (3)"}]}'));
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }

    public function jobsAction() {
        $this->redis = $this->container->get('admin.redis_service');
        $jobs = [];
        $key = 'adverto:jobs:*';
        $jobs['jobs'] = $rJobs = $this->redis->getAll($key);
        for ($x = 0; $x < count($jobs['jobs']); $x++) {
            $jobs['jobs'][$x]->titleDisplay = $jobs['jobs'][$x]->title;
            $jobs['jobs'][$x]->category = $jobs['jobs'][$x]->industry;
            $jobs['jobs'][$x]->categoryDisplay = $jobs['jobs'][$x]->industry;
            if (is_object($jobs['jobs'][$x]->location)) {
                $loc = $jobs['jobs'][$x]->location->city . ',' . $jobs['jobs'][$x]->location->region_code;
                $jobs['jobs'][$x]->location = $loc; //
                $jobs['jobs'][$x]->locationDisplay = $loc; //
            }else {
                $jobs['jobs'][$x]->location = ""; //
                $jobs['jobs'][$x]->locationDisplay = ""; //
            }
            $jobs['jobs'][$x]->url = "/job-details/" . urlencode($jobs['jobs'][$x]->title) . "/" . $jobs['jobs'][$x]->shortcode; //
        }
        $jobs['info'] = ["numberOfPages" => 2, "totalJobs" => count($jobs['jobs'])];
        $response = new JsonResponse($jobs); //json_decode('{"jobs":[{"title":"Sr. Back-End PHP Web Developer","titleDisplay":"Sr. Back-End PHP Web Developer","category":"Web Development","categoryDisplay":"Web Development","location":"QC - Montreal","locationDisplay":"QC - Montreal","groupLocation":"","url":"https%3A%2F%2Fadverto.co%2Fjobsearch%2Fjob-details%2Fsr-back-end-php-web-developer%2F3%2F","lat":"45.5016889","lng":"-73.56725599999999","distance":null},{"title":"Sr. Front-End Web Developer","titleDisplay":"Sr. Front-End Web Developer","category":"Web Development","categoryDisplay":"Web Development","location":"QC - Montreal","locationDisplay":"QC - Montreal","groupLocation":"","url":"https%3A%2F%2Fadverto.co%2Fjobsearch%2Fjob-details%2Fsr-front-end-web-developer%2F4%2F","lat":"45.5016889","lng":"-73.56725599999999","distance":null},{"title":"Web Integrator","titleDisplay":"Web Integrator","category":"Web Development","categoryDisplay":"Web Development","location":"QC - Montreal","locationDisplay":"QC - Montreal","groupLocation":"","url":"https%3A%2F%2Fadverto.co%2Fjobsearch%2Fjob-details%2Fweb-integrator%2F5%2F","lat":"45.5016889","lng":"-73.56725599999999","distance":null}],"info":{"numberOfPages":1,"totalJobs":"3"}}'));
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }

}
