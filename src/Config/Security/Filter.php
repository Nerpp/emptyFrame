<?php

namespace App\Config\Security;

class Filter
{
    private $_aParameters = [];

    public function __setParameters()
    {
        return $this->_aParameters;
    }

    public function __construct()
    {

        $this->listen($_SERVER['REQUEST_METHOD']);
    }


    private function listen(string $requestType)
    {
        $args = array(
            'p'    => FILTER_SANITIZE_STRING,
            'password'    => FILTER_SANITIZE_STRING,
            'passwordConfirm'    => FILTER_SANITIZE_STRING,
            'pseudonyme'    => FILTER_SANITIZE_STRING,
            'mail'    => FILTER_SANITIZE_EMAIL,
            'mail'    => FILTER_VALIDATE_EMAIL,
        );

        switch ($requestType) {
            case 'GET':
                $this->_aParameters =  filter_input_array(INPUT_GET, $args);
                if (!empty($this->_aParameters)) {
                    //je netttoie les variables non utilisé avec array_filter
                    $this->_aParameters = array_filter($this->_aParameters);
                    var_dump($this->_aParameters);
                    return;
                }
                $this->_aParameters = [];
                break;

            default:
                $this->_aParameters = [];
                break;
        }
    }
}
