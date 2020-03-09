<?php

class Equipe{

    private $db;
    private $insert;
    private $select;
    private $delete;
    private $update;
    private $selectById;
    private $selectByIdResponsable;


    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("INSERT INTO `equipe`(`libelle`, `idresponsable`) VALUES (:libelle,:idresponsable)");

        $this->select = $db->prepare("SELECT e.id, e.libelle, u.email, u.nom, u.prenom, e.idresponsable FROM `equipe` e LEFT JOIN `responsable` r ON e.idresponsable = r.idDeveloppeur LEFT JOIN `developpeur` d ON r.idDeveloppeur = d.id LEFT JOIN `utilisateur` u ON d.emailUtilisateur = u.email ORDER BY e.libelle;");

        $this->delete = $db->prepare("DELETE FROM `equipe` where id = :id");

        $this->update = $db->prepare("UPDATE equipe SET equipe.libelle=:libelle, equipe.idresponsable=:idresponsable where equipe.id=:id");

        $this->selectById = $db->prepare("SELECT *, e.id, d.idEquipe
                                          FROM `equipe` e
                                          LEFT JOIN `responsable` r on e.idresponsable = r.idDeveloppeur
                                          LEFT JOIN `developpeur` d ON r.idDeveloppeur = d.id and e.id = d.id
                                          LEFT JOIN `utilisateur` u ON d.emailUtilisateur = u.email
                                          where e.id = :id order by u.nom");


        $this->selectByIdResponsable = $db->prepare("SELECT *
                                                     FROM `equipe` e
                                                     LEFT JOIN `responsable` r on e.idresponsable = r.idDeveloppeur
                                                     LEFT JOIN `developpeur` d ON r.idDeveloppeur = d.id and e.id = d.id
                                                     LEFT JOIN `utilisateur` u ON d.emailUtilisateur = u.email
                                                     where e.idresponsable = :idresponsable");
    }

    public function insert($libelle, $idResponsable){
        $r = true;
        if($idResponsable=="non"){
          $idResponsable=null;
        }

        $this->insert->bindValue(':idResponsable', $idResponsable,PDO::PARAM_STR);

        $this->insert->bindValue(':libelle', $libelle,PDO::PARAM_STR);
        $this->insert->execute();
        if ($this->insert->errorCode()!=0){
             print_r($this->insert->errorInfo());
             $r=false;
        }
        return $r;
    }

    public function select(){
        $this->select->execute();
        if ($this->select->errorCode()!=0){
             print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }

    public function selectByIdResponsable($idResponsable){
        $this->selectByIdResponsable->execute(array(':idresponsable'=>$idResponsable));
        if ($this->selectByIdResponsable->errorCode()!=0){
             print_r($this->selectByIdResponsable->errorInfo());
        }
        return $this->selectByIdResponsable->fetchAll();
    }

    public function update($id, $libelle, $idResponsable){
        $r = true;
        if($idResponsable=="non"){
          $idResponsable=null;
        }
        $this->update->execute(array(':id'=>$id, ':libelle'=>$libelle, ':idresponsable'=>$idResponsable));
        if ($this->update->errorCode()!=0){
             print_r($this->update->errorInfo());
             $r=false;
        }
        return $r;
    }

    public function selectById($id){
        $this->selectById->execute(array(':id'=>$id));
        if ($this->selectById->errorCode()!=0){
            print_r($this->selectById->errorInfo());

        }
        return $this->selectById->fetch();
    }
    public function delete($id){
        $r = true;
        $this->delete->execute(array(':id'=>$id));
        if ($this->delete->errorCode()!=0){
             print_r($this->delete->errorInfo());
             $r=false;
        }
        return $r;
    }


}

?>
