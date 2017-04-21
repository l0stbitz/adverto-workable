<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    public $view = [];
    public $response;

    /**
     * sets some basic parameters that need to be present on every view
     */
    public function __construct()
    {
    }

    /**
     * renders the page and configures some final variables before rendering to browser
     *
     * @param string $template
     * @return Response
     */
    public function _render($template)
    {
        //$resetForm                     = $this->createPasswordResetForm($this->getUser()->getUsername());
        //$this->view['user_reset_form'] = $resetForm->createView();
        $this->view['user']            = $this->getUser();
        $this->view['imageCDN']        = '';

        return $this->render($template, $this->view, $this->response);
    }

    /**
     * sets the cache time on all responses
     *
     * @param int $time
     */
    public function setCacheHeaders($time = false, $norobots = false)
    {
        // default to parameter
        if ($time == false) {
            $time = $this->container->getParameter('cache_expire');
        }

        $this->response = new Response();
        $this->response->setPublic();
        $this->response->setMaxAge($time);

        if ($norobots == true) {
            $this->response->headers->set('X-Robots-Tag', 'noindex');
        }
    }
}
