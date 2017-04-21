<?php

namespace Adverto\JobSearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Adverto\AdminBundle\Service\RedisService as CS;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JobSearchBundle:Default:index.html.twig');
    }
    
    public function filteringAction()
    {
        $response = new JsonResponse(json_decode('{"categories":[{"value":"All Job Categories","text":"All Job Categories (3)"},{"value":"3","text":"Web Development (3)"}],"locations":[{"value":"All Job Locations","text":"All Job Locations (3)"},{"value":"S::QC","text":"QC (3)"},{"value":"C::Montreal!*!QC","text":"&nbsp;&nbsp;&nbsp;Montreal (3)"}]}'));
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }
    
    public function jobsAction()
    {
        $this->redis = $this->container->get('admin.redis_service');
        $jobs = [];
        $key = CS::PREFIX . CS::SP . CS::JOBS;
        $jobs['jobs'] = $rJobs = json_decode($this->redis->get($key));
        for($x=0;$x<count($jobs['jobs']);$x++){
            $jobs['jobs'][$x]->titleDisplay = $jobs['jobs'][$x]->title;
            $jobs['jobs'][$x]->category = "";// $jobs['jobs'][$x]->department;
            $jobs['jobs'][$x]->categoryDisplay = "";
            $jobs['jobs'][$x]->location = "";//
            $jobs['jobs'][$x]->locationDisplay = "";//
            $jobs['jobs'][$x]->url = "/job-details/".urlencode($jobs['jobs'][$x]->title)."/".$jobs['jobs'][$x]->shortcode;//
        }
        $jobs['info'] = ["numberOfPages"=>1,"totalJobs"=>count($jobs['jobs'])];
        $response = new JsonResponse($jobs);//json_decode('{"jobs":[{"title":"Sr. Back-End PHP Web Developer","titleDisplay":"Sr. Back-End PHP Web Developer","category":"Web Development","categoryDisplay":"Web Development","location":"QC - Montreal","locationDisplay":"QC - Montreal","groupLocation":"","url":"https%3A%2F%2Fadverto.co%2Fjobsearch%2Fjob-details%2Fsr-back-end-php-web-developer%2F3%2F","lat":"45.5016889","lng":"-73.56725599999999","distance":null},{"title":"Sr. Front-End Web Developer","titleDisplay":"Sr. Front-End Web Developer","category":"Web Development","categoryDisplay":"Web Development","location":"QC - Montreal","locationDisplay":"QC - Montreal","groupLocation":"","url":"https%3A%2F%2Fadverto.co%2Fjobsearch%2Fjob-details%2Fsr-front-end-web-developer%2F4%2F","lat":"45.5016889","lng":"-73.56725599999999","distance":null},{"title":"Web Integrator","titleDisplay":"Web Integrator","category":"Web Development","categoryDisplay":"Web Development","location":"QC - Montreal","locationDisplay":"QC - Montreal","groupLocation":"","url":"https%3A%2F%2Fadverto.co%2Fjobsearch%2Fjob-details%2Fweb-integrator%2F5%2F","lat":"45.5016889","lng":"-73.56725599999999","distance":null}],"info":{"numberOfPages":1,"totalJobs":"3"}}'));
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }
}
