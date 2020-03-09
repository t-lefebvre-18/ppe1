<?php

class Module{
    
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
        $this->insert = $db->prepare("INSERT INTO Module(id, libelle, idTache) VALUES (:id,:libelle,:idTache)");    
        $this->select = $db->prepare("select * from Module");
        $this->update = $db->prepare("UPDATE Module SET id:=id,libelle:=libelle,idTache:=idTache WHERE id=value-id");
        $this->delete = $db->prepare("delete from Module where id=:id");
        }
    public function insert($id,$libelle,$idTache){
        $r = true;
        $this->insert->execute(array(':id'=>$id, ':libelle'=>$libelle, ':idTache'=>$idTache));
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
    
  
    public function update($id,$libelle,$nbHeure,$coupTache){
        $r = true;
        $this->update->execute(array(':id'=>$id, ':libelle'=>$libelle, ':idTache'=>$idTache));
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

