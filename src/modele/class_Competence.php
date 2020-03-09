<?php

class Competence{
    
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
        $this->insert = $db->prepare("INSERT INTO Competence(id,libelleCompetence,idDev) VALUES (:id,:libelleCompetence,idDev)");    
        $this->select = $db->prepare("select * from Competence");
        $this->update = $db->prepare("UPDATE Competence SET id:=id,libelleCompetence:=libellecompetence,idDev:=idDev WHERE id=value-id");
        $this->delete = $db->prepare("delete from Competence where id=:id");
        }
        
    public function insert($id, $libelleCompetence, $idDev){
        $r = true;
        $this->insert->execute(array(':id'=>$id, ':libelleCompetence'=>$libelleCompetence, ':idDev'=>$idDev));
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
    
  
    public function update($id, $libelleCompetence, $idDev){
        $r = true;
        $this->update->execute(array(':id'=>$id, ':libelleCompetence'=>$libelleCompetence, ':idDev'=>$idDev));
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

