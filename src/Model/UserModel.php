<?php
namespace App\Model;

use App\Config\ConfigModel\AbstractModel;

final class UserModel extends AbstractModel
{


    protected function userSaving(string $pseudonyme, string $email, string $mdp,int $codeValidation)
    {
        $connection = $this->_aConnectionBdd->getConnection();
        $req = $connection->prepare('INSERT INTO utilisateurs (pseudonyme,email,mdp,code_validation) 
        VALUES(:pseudonyme,:email,:mdp,:codeValidation)');
        $req->bindValue(':pseudonyme', $pseudonyme, \PDO::PARAM_STR);
        $req->bindValue(':email', $email, \PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, \PDO::PARAM_STR);
        $req->bindValue(':codeValidation', $codeValidation, \PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
  
}
