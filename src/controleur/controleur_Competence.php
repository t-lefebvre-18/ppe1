<?php

function actionCompetence($twig, $db){
    $form = array(); 
    $contact = new Contact($db);
    
     if(isset($_GET['id'])){
        /* Nous vérifions que Contact n'est pas responsable d'une équipe
           Car nous n'avons pas souhaité faire un DELETE ON CASCADE  
         */ 
        $contact = new Competence($db);
        $liste = $contact->selectById($_GET['id']);
        if($liste==null){
            $exec=$contact->delete($_GET['id']);
            if (!$exec){
                $form['valide'] = false;
                $form['message'] = 'Problème de suppression dans la table Contact';
            }
            else{
                $form['valide'] = true;
                $form['message'] = 'Contact supprimé avec succès';
            }
        }
        else{
           $form['valide'] = false;
           $form['message'] = 'Impossible de supprimer l\'utilisateur, il est affecté à des équipes'; 
        }
       
     }
     $liste = $contact->select();
     echo $twig->render('competence.html.twig', array('form'=>$form,'liste'=>$liste));
}

function actionCompetenceModif($twig, $db){
 $form = array();   
 if(isset($_GET['id'])){
    $contact = new Competence($db);
    $unContact = $contact->selectById($_GET['id']);  
    if ($unContact!=null){
      $form['contact'] = $unContact;
    }
    else{
      $form['message'] = 'Contact incorrect';  
    }
 }
 else{
     if(isset($_POST['btModifier'])){
       $competence = new Competence($db);
       $libelleCompetence = $_POST['libelleCompetence'];
       
       $exec=$competence->update($competence);
       if(!$exec){
         $form['valide'] = false;  
         $form['message'] = 'Echec de la modification des données. '; 
       }
       else{
         $form['valide'] = true;  
         $form['message'] = 'Modification des données réussie. ';  
       }
   
 }
 echo $twig->render('Competence-modif.html.twig', array('form'=>$form));
}
}
?>

