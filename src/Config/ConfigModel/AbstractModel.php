<?php
namespace App\Config\ConfigModel;

use App\Config\Connection\ConnectionDbb;
use App\Config\ConfigModel\InterfaceModel;


class AbstractModel implements InterfaceModel
{

    protected $_rParams;
    protected $_sWhere = '';
    protected $_sSelection = '';
    protected $_sFrom = '';
    protected $_rConnectionDbb;
    
    public function __construct()
    {
        $this->_rConnectionDbb = new ConnectionDbb;

    }

    public function _setParam(){

        return $this->_rParams;
    }

    public function _getparams(array $var)
    {
        $this->_rParams = $var;
    }


    public function findBy(string $selection,string $from, string $where)
    {
        $req = $this->_rConnectionDbb->getConnection()->prepare("SELECT $selection 
        FROM $from 
        WHERE $where = :$where ");
        $req->execute();
        $resultat = $req->fetch(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $resultat[$where];
    }
    
}
