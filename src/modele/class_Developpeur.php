<?php

class Developpeur{

    private $db;
    private $insert;
    private $select;
    private $delete;
    private $update;
    private $selectById;
    private $selectByIdResponsable;


    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert into developpeur(id,nomDev,prenomDev,numDev,emailDev,adrDev,villeDev,paysDev,cpDev) values (:id,:nomDev,:prenomDev,:numDev,:emailDev,:adrDev,:villeDev,:paysDev,:cpDev)");
        $this->select = $db->prepare("SELECT d.id, d.idEquipe, u.nom, u.prenom, u.email, d.numDev, d.adrDev, d.villeDev, d.paysDev, d.cpDev, e.libelle, r.idDeveloppeur
FROM `developpeur` d
LEFT JOIN `utilisateur` u ON d.emailUtilisateur = u.email
LEFT JOIN `equipe` e ON d.idEquipe = e.id
LEFT JOIN `responsable` r ON d.id = r.idDeveloppeur
ORDER BY u.nom");
        $this->delete = $db->prepare("delete from Developpeur where id=:valeur");
        $this->update = $db->prepare("UPDATE `developpeur` SET `idEquipe`= :idEquipe,`numDev`= :numDev, `adrDev`= :adrDev, `villeDev`= :villeDev,`paysDev`= :paysDev,`cpDev`= :cpDev WHERE  `id`= :id");
        $this->selectById = $db->prepare("SELECT d.id, d.idEquipe, u.nom, u.prenom, u.email, d.numDev, d.adrDev, d.villeDev, d.paysDev, d.cpDev, e.id, e.libelle
FROM `developpeur` d
LEFT JOIN `utilisateur` u ON d.emailUtilisateur = u.email
LEFT JOIN `equipe` e ON d.idEquipe = e.id
WHERE d.id = :id
ORDER BY u.nom ");
        $this->selectByIdResponsable = $db->prepare("select id, libelle, idresponsable from equipe where idresponsable=:idresponsable");
    }

    public function insert($nomDev, $prenomDev,$numDev,$emailDev,$adrDev,$villeDev,$paysDev,$cpDev){
        $r = true;
        if($id=="non"){
          $id=null;
        }

        $this->insert->bindValue(':id', $id,PDO::PARAM_STR);

        $this->insert->bindValue(':nomDev', $nomDev,PDO::PARAM_STR);
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

    public function selectByIdEquipe($idEquipe){
        $this->selectByIdResponsable->execute(array(':idEquipe'=>$idEquipe));
        if ($this->selectByIdResponsable->errorCode()!=0){
             print_r($this->selectByIdResponsable->errorInfo());
        }
        return $this->selectByIdResponsable->fetchAll();
    }

    public function update($idEquipe,$numDev,$adrDev,$villeDev,$paysDev,$cpDev,$id){
        $r = true;
        if($idEquipe=="NULL"){
          $idEquipe=null;
        }
        $this->update->execute(array(':idEquipe'=>$idEquipe, ':numDev'=>$numDev, ':adrDev'=>$adrDev, ':villeDev'=>$villeDev, ':paysDev'=>$paysDev, ':cpDev'=>$cpDev, ':id'=>$id));
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
