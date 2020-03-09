<?php

class Contact{

 private $db;
 private $insert;
 private $update;
 private $select;
 private $selectByEmail;
 private $delete;

 public function __construct($db){

   $this->db = $db;
   $this->insert = $db->prepare("INSERT INTO `contact`(`nom`, `prenom`, `email`, `num`) VALUES (:nom,:prenom,:email,:num))");
   $this->update = $db->prepare("UPDATE `contact` SET `nom`=:nom,`prenom`=:prenom,`num`=:num WHERE `email`=:email");
   $this->select = $db->prepare("SELECT `nom`, `prenom`, `email`, `num` FROM `contact`");
   $this->selectByEmail = $db->prepare("SELECT `nom`, `prenom`, `email`, `num` FROM `contact` WHERE `email`=:email");
   $this->delete = $db->prepare("DELETE FROM `contact` WHERE `email`=:email");
 }

 public function insert($nom,$prenom,$email,$num){

   $r = true;
   $this->insert->execute(array(':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':num'=>$num));
   if ($this->insert->errorCode()!=0){

     print_r($this->insert->errorInfo());
     $r=false;
   }
   return $r;
 }

 public function update($nom,$prenom,$email,$num){

   $r = true;
   $this->update->execute(array(':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':num'=>$num));
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

 public function selectByEmail($email){

   $this->selectByEmail->execute(array(':email'=>$email));
   if ($this->selectByEmail->errorCode()!=0){

     print_r($this->selectByEmail->errorInfo());
   }
   return $this->selectByEmail->fetch();
 }

 public function delete($email){

   $r = true;
   $this->delete->execute(array(':email'=>$email));
   if ($this->delete->errorCode()!=0){

     print_r($this->delete->errorInfo());
     $r=false;
   }
   return $r;
 }
}
?>
