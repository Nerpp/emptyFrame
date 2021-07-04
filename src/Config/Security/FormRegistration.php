<?php
namespace App\Config\Security;


class FormRegistration
{

    protected $_aParams;
    protected $_aErr;
    protected $_iLenght = 8;

    public function _getParam(array $var)
    {
     $this->_aParams = $var; 
     $this->checkRegistration();  
    }

    public function _setErr()
    {
        return $this->_aErr;
    }

    
    private function checkRegistration()
    {
        if (!isset($this->_aParams['mail'])) {
            
            $this->_aErr['mail'] = "Veuillez renseigner une adresse mail valide";
        }

        if (!isset($this->_aParams['pseudonyme'])) {
           
            $this->_aErr['pseudonyme'] = "Vous devez choisir un pseudonyme";
         }

         if (!isset($this->_aParams['password'])) {
            $this->_aErr['password'] = "Veuillez renseigner votre mot de passe";
        }

        if (!isset($this->_aParams['passwordConfirm'])) {
            $this->_aErr['password'] = "Veuillez confirmer votre mot de passe";
        }

        if(!empty($this->_aErr))
        {
            return;
        }

        $this->checkPassword();

    }

    private function checkPassword()
    {
        if (strlen($this->_aParams['password']) < $this->_iLenght) {
            $this->_aErr['password'] = "Le mot de passe doit être superieur à ".$this->_iLenght." caractéres";
        }

        $pattern = "#[?,;./:§!%µ*¨^£$\¤{}()[\]\-\|`_\\@&~\#]#";

        if (!preg_match($pattern, $this->_aParams['password'])) {
            $this->_aErr['password'] = "Le mot de passse doit contenir des caractéres speciaux";
        }

        if($this->_aParams['password'] != $this->_aParams['passwordConfirm']){
            $this->_aErr['Err']['password'] = "Veuillez confirmer votre mot de passe";
        }

    }
}