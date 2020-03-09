<?php

function actionResponsable($twig, $db){
    $form = array(); 
    $responsable = new Responsable($db);
    
     if(isset($_GET['id'])){
        /* Nous vérifions que Developeur n'est pas responsable d'une équipe
           Car nous n'avons pas souhaité faire un DELETE ON CASCADE  
         */ 
        $responsable = new Responsable($db);
        $liste = $responsable->selectById($_GET['id']);
        if($liste==null){
            $exec=$responsable->delete($_GET['id']);
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
           $form['message'] = 'Impossible de supprimer le developpeur'; 
        }
       
     }
     $liste = $responsable->select();
     echo $twig->render('responsable.html.twig', array('form'=>$form,'liste'=>$liste));
}

function actionResponsableModif($twig, $db){
 $form = array();   
 if(isset($_GET['id'])){
    $responsable = new Developpeur($db);
    $unResponsable = $responsable->selectById($_GET['id']);  
    if ($unResponsable!=null){
      $form['developpeur'] = $unResponsable;
    }
    else{
      $form['message'] = 'Contact incorrect';  
    }
 }
 else{
     if(isset($_POST['btModifier'])){
       $responsable = new Responsable($db);
       $orgadelais = $_POST['orgadelais'];
       $geredelais = $_POST['geredelais'];
       $besoinHumain = $_POST['besoinHumain'];
       $materiel = $_POST['materiel'];
       
      
       $exec=$contact->update($responsable, $orgadelais, $geredelais, $besoinHumain,$materiel);
       if(!$exec){
         $form['valide'] = false;  
         $form['message'] = 'Echec de la modification des données. '; 
       }
       else{
         $form['valide'] = true;  
         $form['message'] = 'Modification des données réussie. ';  
       }  
 }
 echo $twig->render('responsable-modif.html.twig', array('form'=>$form));
}
}
?>

