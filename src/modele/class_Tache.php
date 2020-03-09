<?php

class Tache{

  private $db;
  private $insert;
  private $update;
  private $select;
  private $selectById;
  private $delete;

    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("INSERT INTO `tache`(`libelle`, `nbHeure`, `coupTache`) VALUES (:libelle,:nbHeure,:coupTache)");
        $this->select = $db->prepare("SELECT `id`, `libelle`, `nbHeure`, `coupTache` FROM `tache`");
        $this->selectById = $db->prepare("SELECT `libelle`, `nbHeure`, `coupTache` FROM `tache` WHERE `id`=:id");
        $this->update = $db->prepare("UPDATE `tache` SET `libelle`=:libelle,`nbHeure`=:nbHeure,`coupTache`=:coupTache WHERE `id`=:id");
        $this->delete = $db->prepare("DELETE FROM `tache` WHERE id=:id");
        }
    public function insert($id,$libelle,$nbHeure,$coupTache){
        $r = true;
        $this->insert->execute(array(':id'=>$id, ':libelle'=>$inputLibelle, ':nbHeure'=>$inputNbHeure, ':coupTache'=>$inputCoupTache));
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

    public function selectById($id){

      $this->selectById->execute(array(':id'=>$id));
      if ($this->selectById->errorCode()!=0){

        print_r($this->selectById->errorInfo());
      }
      return $this->selectById->fetch();
    }

    public function update($id,$libelle,$nbHeure,$coupTache){
        $r = true;
        $this->update->execute(array(':id'=>$id, ':libelle'=>$libelle, ':nbHeure'=>$nbHeure, ':coupTache'=>$coupTache));
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
