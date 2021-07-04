<?php
namespace App\Config\ConfigController;


interface InterfaceController
{
    public function _setParam();
    public function _setPage();
    public function _getParam(string $page, array $var);
}