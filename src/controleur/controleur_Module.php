<?php

function actionModule($twig, $db){
    $form = array(); 
    $module = new Module($db);
    
     if(isset($_GET['id'])){
        /* Nous vérifions que Developeur n'est pas responsable d'une équipe
           Car nous n'avons pas souhaité faire un DELETE ON CASCADE  
         */ 
        $module = new Module ($db);
        $liste = $module->selectById($_GET['id']);
        if($liste==null){
            $exec=$module->delete($_GET['id']);
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
     $liste = $module->select();
     echo $twig->render('module.html.twig', array('form'=>$form,'liste'=>$liste));
}

function actionModuleModif($twig, $db){
 $form = array();   
 if(isset($_GET['id'])){
    $module = new Module($db);
    $unModule = $module->selectById($_GET['id']);  
    if ($unModule!=null){
      $form['entreprise'] = $unModule;
    }
    else{
      $form['message'] = 'Contact incorrect';  
    }
 }
 else{
     if(isset($_POST['btModifier'])){
       $module = new Module($db);
       $libelle = $_POST['libelle'];
      
       
      
       $exec=$contact->update($libelle);
       if(!$exec){
         $form['valide'] = false;  
         $form['message'] = 'Echec de la modification des données. '; 
       }
       else{
         $form['valide'] = true;  
         $form['message'] = 'Modification des données réussie. ';  
       }  
 }
 echo $twig->render('module-modif.html.twig', array('form'=>$form));
}
}
?>
 
