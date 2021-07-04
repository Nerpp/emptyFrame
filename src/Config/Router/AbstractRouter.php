<?php
namespace App\Config\Router;

use App\Config\Security\Filter;

use App\Controller\UserRegistration;


class AbstractRouter
{
    protected $_aParam = [];
    protected $_sFolder = '';

    public function __construct()
    {
        $this->_aUserRegistration = new UserRegistration;
    }
   
    protected function redirectRoute(string $page,array $param)
    {
        if(!empty($page)){
            $this->_sFolder = $page;
        }
        
        if (!empty($param)) {
            $this->_aParam = $param;
        }
       
    }
    
    protected function urlAdmin()
    {
        $aCleanedUrl = (new Filter())->__setParameters();
        $this->_sFolder = (!isset($aCleanedUrl['p'])) ? 'index' : $aCleanedUrl['p'];  
        
        if(!empty($aCleanedUrl)){
            unset($aCleanedUrl[array_search($aCleanedUrl['p'], $aCleanedUrl)]);
            $this->_aParam = $aCleanedUrl;
        }
    }
}