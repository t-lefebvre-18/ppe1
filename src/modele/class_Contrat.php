<?php

class Contrat{

    private $db;
    private $insert;
    private $connect;
    private $select;
    private $selectById;
    private $update;
    private $updateMdp;
    private $delete;

    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("INSERT INTO contrat(libelle,dureeContrat,budgetNegocie,idEntreprise) VALUES (:libelle,:dureeContrat,:budgetNegocie,:idEntreprise)");
        $this->select = $db->prepare("SELECT c.id, c.idEntreprise, c.libelle, c.dureeContrat, c.budgetNegocie, e.libelleEnt  FROM `contrat` c JOIN `entreprise` e ON c.idEntreprise = e.id");
        $this->update = $db->prepare("UPDATE `contrat` SET `libelle`=:libelle,`dureeContrat`=:dureeContrat,`budgetNegocie`=:budgetNegocie,`idEntreprise`=:idEntreprise WHERE id = :id");
        $this->delete = $db->prepare("DELETE FROM `contrat` WHERE id=:id");
       $this->selectById = $db->prepare("SELECT c.id, c.idEntreprise, c.libelle, c.dureeContrat, c.budgetNegocie, e.libelleEnt  FROM `contrat` c JOIN `entreprise` e ON c.idEntreprise = e.id where c.id = :id");
        }

    public function insert($libelle,$dureeContrat, $budgetNegocie,$idEnt){
        $r = true;
        $this->insert->execute(array(':libelle'=>$libelle, ':dureeContrat'=>$dureeContrat, ':budgetNegocie'=>$budgetNegocie,':idEntreprise'=>$idEnt));
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


    public function update($id,$libelle,$dureeContrat, $budgetNegocie,$idEntreprise){
        $r = true;
        $this->update->execute(array(':id'=>$id, ':libelle'=>$libelle, ':dureeContrat'=>$dureeContrat, ':budgetNegocie'=>$budgetNegocie, ':idEntreprise'=>$idEntreprise));
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
    
     public function selectById($id){

   $this->selectById->execute(array(':id'=>$id));
   if ($this->selectById->errorCode()!=0){

     print_r($this->selectById->errorInfo());
   }
   return $this->selectById->fetch();
 }

}

?>
