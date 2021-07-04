<?php

namespace App\Controller;

use App\Config\ConfigController\AbstractController;
use App\Model\UserModel;
use App\Config\Security\FormRegistration;

final class UserRegistration extends AbstractController
{
    public function __construct()
    {
        $this->dbbCon = new UserModel;
        $this->formRegistration = new FormRegistration;
    }

    private function userRegistration()
    {
        $this->formRegistration->_getParam($this->_aParams);

        if (!empty($this->formRegistration->_setErr())) {
            $this->_aParams['Err'] = $this->formRegistration->__setErr();
            return;
        }

        $checkPseudo = $this->dbbCon->findBy('pseudonyme', 'user', 'pseudonyme');

        var_dump($checkPseudo);


        // $this->insertDbb();
    }

    private function insertDbb()
    {
        // $this->dbbCon->userSaving(string $pseudonyme, string $email, string $mdp,int $codeValidation)
    }
}
