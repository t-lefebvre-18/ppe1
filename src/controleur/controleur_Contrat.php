<?php
function actionContrat($twig, $db){

  $form = array();
  $contrat = new Contrat($db);
  if(isset($_POST['btSupprimer'])){

    $cocher = $_POST['cocher'];
    $form['valide'] = true;
    foreach ( $cocher as $id){

      $exec=$contrat->delete($id);
      if (!$exec){

        $form['valide'] = false;
        $form['message'] = 'Problème de suppression dans la table Contact';
      }
    }
  }
  if(isset($_GET['id'])){

    $exec=$contrat->delete($_GET['id']);
    if (!$exec){

      $form['valide'] = false;
      $form['message'] = 'Problème de suppression dans la table Contact';
    }
    else{

      $form['valide'] = true;
      $form['message'] = 'Contact supprimé avec succès';
    }
  }
  $liste = $contrat->select();
  echo $twig->render('contrat.html.twig', array('form'=>$form,'liste'=>$liste));
}
################################################################################
function actionContratAjout($twig, $db){

  $form = array();
  $contrat = new Contrat($db);
  $entreprise = new Entreprise($db);
  if (isset($_POST['btAjouter'])){

    $libelle = $_POST['libelle'];
    $dureeContrat  = $_POST['dureeContrat'];
    $budgetNegocie = $_POST['budgetNegocie'];
    $idEnt = $_POST['idEntreprise'];
    $form['valide'] = true;
    $form['messageTitre'] = 'Contrat ajoutée';
    $form['message'] = 'Le libelle pour Contrat a bien été ajouter !';
    $exec = $contrat->insert($libelle,$dureeContrat, $budgetNegocie,$idEnt);
    if (!$exec){

      $form['valide'] = false;
      $form['messageTitre'] = 'Echec de l\'ajout';
      $form['message'] = 'Le libelle pour Contrat na pas put être ajouté !';
    }
  }

  $liste = $entreprise->select();
  echo $twig->render('contrat-ajout.html.twig', array('form'=>$form,'liste'=>$liste));
}
################################################################################
function actionContratModif($twig, $db){

   $form = array();
  if(isset($_GET['id'])){

    $contrat = new Contrat($db);
    $entreprise = new Entreprise($db);
    $unContrat = $contrat->selectById($_GET['id']);
    if ($unContrat!=null){$form['contrat'] = $unContrat;}
    else{$form['message'] = 'libelle incorrect';}
  }
  else{

    if (isset($_POST['btModifier'])){

      $contrat = new Contrat($db);
      $entreprise = new Entreprise($db);
      $id = $_POST['id'];
       $libelle = $_POST['libelle'];
       $dureeContrat  = $_POST['dureeContrat'];
       $budgetNegocie = $_POST['budgetNegocie'];
       $idEntreprise = $_POST['idEntreprise'];
       
      $form['valide'] = true;
      $form['message'] = 'Modification réussie';
    
      $exec=$contrat->update($id,$libelle,$dureeContrat, $budgetNegocie,$idEntreprise);
      if(!$exec){

        $form['valide'] = false;
        $form['message'] = 'Échec de la modification';
      }
    }
  }
  $liste = $contrat->select();
  $listeE = $entreprise->select();
  echo $twig->render('contrat-modif.html.twig', array('form'=>$form,'liste'=>$liste,'listeE'=>$listeE));
 }
?>
