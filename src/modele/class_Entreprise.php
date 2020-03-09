<?php

class Entreprise{

 private $db;
 private $insert;
 private $update;
 private $select;
 private $selectById;
 private $delete;

 public function __construct($db){

   $this->db = $db;
   $this->insert = $db->prepare("INSERT INTO `entreprise`(`libelleEnt`, `villeEnt`, `adrEnt`, `numEnt`, `faxEnt`, `cpEnt`, `paysEnt`, `emailContact`) VALUES (:libelleEnt,:villeEnt,:adrEnt,:numEnt,:faxEnt,:cpEnt,:paysEnt,:emailContact)");
   $this->update = $db->prepare("UPDATE `entreprise` SET `libelleEnt`=:libelleEnt,`villeEnt`=:villeEnt,`adrEnt`=:adrEnt,`numEnt`=:numEnt,`faxEnt`=:faxEnt,`cpEnt`=:cpEnt,`paysEnt`=:paysEnt,`emailContact`=:emailContact WHERE `id`=:id");
   $this->select = $db->prepare("SELECT `id`, `libelleEnt`, `villeEnt`, `adrEnt`, `numEnt`, `faxEnt`, `cpEnt`, `paysEnt`, `emailContact` FROM `entreprise`");
   $this->selectById = $db->prepare("SELECT `id`, `libelleEnt`, `villeEnt`, `adrEnt`, `numEnt`, `faxEnt`, `cpEnt`, `paysEnt`, `emailContact` FROM `entreprise` WHERE `id`=:id");
   $this->delete = $db->prepare("DELETE FROM `entreprise` WHERE `id`=:id");
 }

 public function insert($libelleEnt,$villeEnt,$adrEnt,$numEnt,$faxEnt,$cpEnt,$paysEnt,$emailContact){

   $r = true;
   $this->insert->execute(array(':libelleEnt'=>$libelleEnt,':villeEnt'=>$villeEnt,':adrEnt'=>$adrEnt,':numEnt'=>$numEnt,':faxEnt'=>$faxEnt,':cpEnt'=>$cpEnt,':paysEnt'=>$paysEnt,':emailContact'=>$emailContact));
   if ($this->insert->errorCode()!=0){
 
     print_r($this->insert->errorInfo());
     $r=false;
   }
   return $r;
 }

 public function update($id,$libelleEnt, $villeEnt, $adrEnt, $numEnt ,$faxEnt , $cpEnt,$paysEnt,$emailContact){

   $r = true;
   $this->update->execute(array(':libelleEnt'=>$libelleEnt,':villeEnt'=>$villeEnt,':adrEnt'=>$adrEnt,':numEnt'=>$numEnt,':faxEnt'=>$faxEnt,':cpEnt'=>$cpEnt,':paysEnt'=>$paysEnt,':emailContact'=>$emailContact,':id'=>$id));
   if ($this->update->errorCode()!=0){

     print_r($this->update->errorInfo());
     $r=false;
   }
   return $r;
 }

 public function select(){

   $liste = $this->select->execute();
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
