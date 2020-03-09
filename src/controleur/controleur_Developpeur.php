<?php

function actionDeveloppeur($twig, $db){
    $form = array();
    $developpeur= new Developpeur($db);

     if(isset($_GET['id'])){
        /* Nous vérifions que Developeur n'est pas responsable d'une équipe
           Car nous n'avons pas souhaité faire un DELETE ON CASCADE
         */
        $developpeur = new Developpeur($db);
        $liste = $developpeur->selectById($_GET['id']);
        if($liste==null){
            $exec=$developpeur->delete($_GET['id']);
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
     $liste = $developpeur->select();
     echo $twig->render('developpeur.html.twig', array('form'=>$form,'liste'=>$liste));
}
################################################################################
function actionDeveloppeurModif($twig, $db){
  $form = array();
  if(isset($_GET['id'])){

  $developpeur = new Developpeur($db);

  $unDeveloppeur = $developpeur->selectById($_GET['id']);

  if ($unDeveloppeur!=null){
    $form['developpeur'] = $unDeveloppeur;
  }
  else{
    $form['message'] = 'developpeur incorrect';
  }

  }
   else{
     if(isset($_POST['btModifier'])){
       $developpeur = new Developpeur($db);
       $idEquipe = $_POST['idEquipe'];
       $numDev = $_POST['numDev'];
       $adrDev = $_POST['adrDev'];
       $villeDev = $_POST['villeDev'];
       $paysDev = $_POST['paysDev'];
       $cpDev = $_POST['cpDev'];
       $id = $_POST['id'];
       $exec=$developpeur->update($idEquipe,$numDev,$adrDev,$villeDev,$paysDev,$cpDev,$id);
       if(!$exec){
         $form['valide'] = false;
         $form['message'] = 'Echec de la modification des données. ';
       }
       else{
         $form['valide'] = true;
         $form['message'] = 'Modification des données réussie. ';
       }
  }
   }
 $liste = $developpeur->select();
 $equipe= new Equipe($db);
 $listeEquipe = $equipe->select();
 echo $twig->render('developpeur-modif.html.twig', array('form'=>$form,'liste'=>$liste,'listeEquipe'=>$listeEquipe));
}


?>
