<?php

namespace App\Config\ConfigController;



abstract class AbstractController implements InterfaceController
{
    protected $_aParams = [];
    protected $_sPage   = '';
    protected $_aErr = [];


    // abstract public function _getParam(string $page, array $var);

    public function _setParam()
    {
        return $this->_aParams;
    }

    public function _setPage()
    {
       return $this->_sPage ;
    }

    protected function _getPage(string $var)
    {
         $this->_sPage = $var;
    }

    public function _getParam(string $page, array $var)
    {
        $this->_sPage = $page;
        $this->_aParams  = $var;
    }


}
