<?php
namespace App\Config\Env;


class Env
{
    protected $_aData = [];

    private $_sFileName = '.env.txt';
    

    protected function configBdd()
    {
        
        if (file_exists($this->_sFileName)) {
            $aData = file($this->_sFileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $valueBdd = explode('=', $aData[1]);
            $this->_aData += array('bddName'=>trim($valueBdd[1]));
            
            $valueServeur = explode('=', $aData[2]);
            $this->_aData += array('valueServeur'=>trim($valueServeur[1]));
            
            $valueRoot = explode('=', $aData[3]);
            $this->_aData += array('valueRoot'=>trim($valueRoot[1]));
            $valueMdp = explode('=', $aData[4]);
            $this->_aData += array('valueMdp'=>trim($valueMdp[1]));

        } else {
            header('HTTP/1.1 404 Not Found');
            header('Location: vue\404.php');
            exit;
        }
    }
    
}
