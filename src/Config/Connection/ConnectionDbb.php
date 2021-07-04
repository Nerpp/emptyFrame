<?php

namespace App\Config\Connection;

use App\Config\Env\Env;
use App\Config\Exception\ExceptionCustom;
use \PDO;

class ConnectionDbb extends Env
{

    private $_rConnection;

    public function getConnection()
    {
        return $this->_rConnection;
    }
    public function __construct()
    {

        $this->configBdd();

        $options = [
            PDO::MYSQL_ATTR_COMPRESS => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->_rConnection = new \PDO('mysql:host=' . $this->_aData['valueServeur'] . ';dbname=' . $this->_aData['bddName'] . ';charset=utf8', $this->_aData['valueRoot'], $this->_aData['valueMdp'], $options);
        } catch (\PDOException $e) {

            (new ExceptionCustom())->enregistrementErreur($e);
        }
    }
}
