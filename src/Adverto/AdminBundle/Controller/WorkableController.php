<?php

namespace Adverto\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class WorkableController extends BaseController {

    public function indexAction() {
        return $this->_render('AdminBundle:Workable:index.html.twig');
    }

    public function searchCanidatesAction(Request $request, $query = "") {
        $start = $request->get('start', 0);
        $limit = $request->get('length', 0);
        $search = $request->get('search', []);
        $order = $request->get('order', []);
        $columns = $request->get('columns', []);


        $this->view['data'] = $this->container->get('admin.workable_service')->getCandidatesFromRedis(true);
        $this->view['draw'] = $request->get('draw', 1);
        $this->view['recordsTotal'] = 0; //$totalUsers;
        $this->view['recordsFiltered'] = 0; //$totalFiltered;

        $response = new JsonResponse($this->view);
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }

    public function searchJobsAction(Request $request, $query = "") {
        $start = $request->get('start', 0);
        $limit = $request->get('length', 0);
        $search = $request->get('search', []);
        $order = $request->get('order', []);
        $columns = $request->get('columns', []);


        $this->view['data'] = $this->container->get('admin.workable_service')->getJobsFromRedis(true);
        $this->view['draw'] = $request->get('draw', 1);
        $this->view['recordsTotal'] = 0; //$totalUsers;
        $this->view['recordsFiltered'] = 0; //$totalFiltered;

        $response = new JsonResponse($this->view);
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }

    public function getJobAction(Request $request, $id = "") {
        $data = $this->container->get('admin.workable_service')->getJobFromRedis($id);
        $response = new JsonResponse($data);
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }

    public function getJobApplicationFieldsAction(Request $request, $id = "") {
        $data = $this->container->get('admin.workable_service')->getJobApplicationFieldsFromRedis($id);
        $response = new JsonResponse($data);
        $response->setPublic();
        // cache for 15 minutes
        $response->setMaxAge(60 * 15);

        return $response;
    }

}
