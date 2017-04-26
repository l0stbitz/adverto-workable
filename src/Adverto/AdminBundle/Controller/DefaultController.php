<?php

namespace Adverto\AdminBundle\Controller;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->_render('AdminBundle:Default:index.html.twig');
    }
    
    public function profileAction()
    {
        return $this->_render('AdminBundle:Default:profile.html.twig');
    }   
    
    public function settingsAction()
    {
        return $this->_render('AdminBundle:Default:settings.html.twig');
    }    
        
    public function usersAction()
    {
        return $this->_render('AdminBundle:Default:users.html.twig');
    }    
    
    public function jmpAction()
    {
        return $this->_render('AdminBundle:Default:jmp.html.twig');
    }    
    
        
    public function reportAction()
    {
        return $this->_render('AdminBundle:Default:index.html.twig');
    }    
    
    public function analyticsAction()
    {
        return $this->_render('AdminBundle:Default:index.html.twig');
    }           
}
