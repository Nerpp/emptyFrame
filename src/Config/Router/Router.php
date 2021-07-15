<?php
namespace App\Config\Router;


class Router extends AbstractRouter{

    protected function router(){

        $this->urlAdmin();

        switch ($this->_sFolder) {

            case 'index':
            
                break;
            
            case 'gestion':
                
                break;

            case 'userRegistration':
                // $this->_aUserRegistration = new UserRegistration;
                $this->_aUserRegistration->_getParam($this->_sFolder,$this->_aParam);
                $this->redirectRoute($this->_aUserRegistration->_setPage(),$this->_aUserRegistration->_setParam());
                break;
            
            default:
            $this->_sFolder = '404';
                break;
        }
    }

}