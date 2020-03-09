<?php
function actionEntreprise($twig, $db){

  $form = array();
  $entreprise = new Entreprise($db);;
  if(isset($_POST['btSupprimer'])){

    $cocher = $_POST['cocher'];
    $form['valide'] = true;
    foreach ( $cocher as $id){

      $exec=$entreprise->delete($id);
      if (!$exec){

        $form['valide'] = false;
        $form['message'] = 'Problème de suppression dans la table Entreprise';
      }
    }
  }
  if(isset($_GET['id'])){

    $exec=$entreprise->delete($_GET['id']);
    if (!$exec){

      $form['valide'] = false;
      $form['message'] = 'Problème de suppression dans la table Entreprise';
    }
    else{

      $form['valide'] = true;
      $form['message'] = 'Entreprise supprimé avec succès';
    }
  }
  $liste = $entreprise->select();
  echo $twig->render('entreprise.html.twig', array('form'=>$form,'liste'=>$liste));
}
################################################################################
function actionEntrepriseAjout($twig, $db){

  $form = array();
  $entreprise = new Entreprise($db);
  $contact = new Contact($db);
  if (isset($_POST['btAjouter'])){

    $libelleEnt = $_POST['libelleEnt'];
    $villeEnt = $_POST['villeEnt'];
    $adrEnt = $_POST['adrEnt'];
    $numEnt = $_POST['numEnt'];
    $faxEnt = $_POST['faxEnt'];
    $cpEnt = $_POST['cpEnt'];
    $paysEnt = $_POST['paysEnt'];
    $emailContact = $_POST['emailContact'];
    $form['valide'] = true;
    $form['messageTitre'] = 'Entreprise ajoutée';
    $form['message'] = 'Le libelle pour Entreprise a bien été ajouter !';
    $exec = $entreprise->insert($libelleEnt, $villeEnt, $adrEnt, $numEnt ,$faxEnt , $cpEnt,$paysEnt,$emailContact);
    if (!$exec){

      $form['valide'] = false;
      $form['messageTitre'] = 'Echec de l\'ajout';
      $form['message'] = 'Le libelle pour Entreprise na pas put être ajouté !';
    }
  }
  $liste = $entreprise->select();
  
  $listec = $contact->select();
  echo $twig->render('entreprise-ajout.html.twig', array('form'=>$form,'liste'=>$liste,'listec'=>$listec));
}
################################################################################
function actionEntrepriseModif($twig, $db){

  $form = array();
  if(isset($_GET['id'])){

    $entreprise = new Entreprise($db);
    $contact = new Contact($db);
    $unEntreprise = $entreprise->selectById($_GET['id']);
    if ($unEntreprise!=null){$form['entreprise'] = $unEntreprise;}
    else{$form['message'] = 'libelle incorrect';}
  }
  else{

    if (isset($_POST['btModifier'])){

      $entreprise = new Entreprise($db);
       $contact = new Contact($db);
    $libelleEnt = $_POST['libelleEnt'];
    $villeEnt = $_POST['villeEnt'];
    $adrEnt = $_POST['adrEnt'];
    $numEnt = $_POST['numEnt'];
    $faxEnt = $_POST['faxEnt'];
    $cpEnt = $_POST['cpEnt'];
    $paysEnt = $_POST['paysEnt'];
    $emailContact = $_POST['emailContact'];
      $id = $_POST['id'];
   
      
      $exec=$entreprise->update($id,$libelleEnt, $villeEnt, $adrEnt, $numEnt ,$faxEnt , $cpEnt,$paysEnt,$emailContact);
      if(!$exec){

        $form['valide'] = false;
        $form['message'] = 'Échec de la modification';
      }
         $form['valide'] = true;
      $form['message'] = 'Modification réussie ';
    }
  }
  $liste = $entreprise->select();
  $listec = $contact->select();
  echo $twig->render('entreprise-modif.html.twig', array('form'=>$form,'liste'=>$liste,'listec'=>$listec));
 }
?>
