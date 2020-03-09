<?php

class Projet{
    
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
        $this->insert = $db->prepare("INSERT INTO Projet(id, charge,idModule,idEquipe,idContrat) VALUES (:id,:charge,:idModule,:idEquipe,:idEquipe)");    
        $this->select = $db->prepare("select * from Projet");
        $this->update = $db->prepare("id:=id,charge:=charge,idModule:=idModule,idEquipe:=idEquipe,idContrat:=idContrat WHERE id=value-id");
        $this->delete = $db->prepare("delete from Projet where id=:id");
        }
    public function insert($id, $charge,$idModule,$idEquipe,$idContrat){
        $r = true;
        $this->insert->execute(array(':id'=>$id, ':charge'=>$charge, ':idModule'=>$idModule, ':idEquipe'=>$idEquipe, ':idContrat'=>$idContrat, ':idModule'=>$idModule));
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
    
  
    public function update($id, $charge,$idModule,$idEquipe,$idContrat){
        $r = true;
        $this->update->execute(array(':id'=>$id, ':charge'=>$charge, ':idModule'=>$idModule, ':idEquipe'=>$idEquipe, ':idContrat'=>$idContrat, ':idModule'=>$idModule));
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

