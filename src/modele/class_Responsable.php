<?php

class Responsable{

    private $db;
    private $insert;
    private $connect;
    private $select;
    private $selectByEmail;
    private $update;
    private $updateMdp;
    private $delete;

    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("INSERT INTO Responsable(idDeveloppeur, gereDelais, besoinHumain, materiel) VALUES (:id,:orgaDelais,:gereDelais,:besoinHumain,:materiel,:idEquipe,idDev)");
        $this->select = $db->prepare("SELECT r.idDeveloppeur, r.gereDelais, r.besoinHumain, r.materiel, u.nom, u.prenom FROM `responsable` r JOIN `developpeur` d on r.idDeveloppeur = d.id JOIN `utilisateur` u ON d.emailUtilisateur = u.email");
        $this->update = $db->prepare("UPDATE Responsable SET id:=id,orgaDelais:=orgadelais,gereDelais:=gereDelais,besoinHumain:=besoinHumain,materiel:=materiel,idEquipe:=idEquipe,idDev:=idDev WHERE id=value-id");
        $this->delete = $db->prepare("delete from Responsable where id=:id");
        }
    public function insert($id,$orgaDelais,$gereDelais,$besoiHumain,$materiel,$idEquipe,$idDev){
        $r = true;
        $this->insert->execute(array(':id'=>$id, ':orgaDelais'=>$orgaDelais, ':gereDelais'=>$gereDelais, ':besoinHumain'=>$besoinHumain, ':materiel'=>$materiel, ':idEquipe'=>$idEquipe, ':idDev'=>$idDev));
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


    public function update($id,$orgaDelais,$gereDelais,$besoiHumain,$materiel,$idEquipe,$idDev){
        $r = true;
        $this->update->execute(array(':id'=>$id, ':orgaDelais'=>$orgaDelais, ':gereDelais'=>$gereDelais, ':besoinHumain'=>$besoinHumain, ':materiel'=>$materiel, ':idEquipe'=>$idEquipe, ':idDev'=>$idDev));
        if ($this->update->errorCode()!=0){
             print_r($this->update->errorInfo());
             $r=false;
        }
        return $r;
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
