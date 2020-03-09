<?php
function actionContact($twig, $db){

  $form = array();
  $contact = new Contact($db);
  if(isset($_POST['btSupprimer'])){

    $cocher = $_POST['cocher'];
    $form['valide'] = true;
    foreach ( $cocher as $email){

      $exec=$contact->delete($email);
      if (!$exec){

        $form['valide'] = false;
        $form['message'] = 'Problème de suppression dans la table Contact';
      }
    }
  }
  if(isset($_GET['email'])){

    $exec=$contact->delete($_GET['email']);
    if (!$exec){

      $form['valide'] = false;
      $form['message'] = 'Problème de suppression dans la table Contact';
    }
    else{

      $form['valide'] = true;
      $form['message'] = 'Contact supprimé avec succès';
    }
  }
  $liste = $contact->select();
  echo $twig->render('contact.html.twig', array('form'=>$form,'liste'=>$liste));
}
################################################################################
function actionContactAjout($twig, $db){

  $form = array();
  $contact = new Contact($db);
  if (isset($_POST['btAjouter'])){

    $nomContact = $_POST['nom'];
    $prenomContact = $_POST['prenom'];
    $emailContact = $_POST['email'];
    $numContact = $_POST['num'];
    $form['valide'] = true;
    $form['messageTitre'] = 'Genre ajoutée';
    $form['message'] = 'Le libelle pour Genre a bien été ajouter !';
    $exec = $contact->insert($nomContact,$prenomContact,$emailContact,$numContact);
    if (!$exec){

      $form['valide'] = false;
      $form['messageTitre'] = 'Echec de l\'ajout';
      $form['message'] = 'Le libelle pour Genre na pas put être ajouté !';
    }
  }
  $liste = $contact->select();
  echo $twig->render('contact-ajout.html.twig', array('form'=>$form,'liste'=>$liste));
}
################################################################################
function actionContactModif($twig, $db){

  $form = array();
  if(isset($_GET['email'])){

    $contact = new Contact($db);
    $unContact = $contact->selectByEmail($_GET['email']);
    if ($unContact!=null){$form['contact'] = $unContact;}
    else{$form['message'] = 'libelle incorrect';}
  }
  else{

    if (isset($_POST['btModifier'])){

      $contact = new Contact($db);
      $nomContact = $_POST['nom'];
      $prenomContact = $_POST['prenom'];
      $emailContact = $_POST['email'];
      $numContact = $_POST['num'];
      $form['valide'] = true;
      $form['message'] = 'Modification réussie';
      $exec=$contact->update($nomContact,$prenomContact,$emailContact,$numContact);
      if(!$exec){

        $form['valide'] = false;
        $form['message'] = 'Échec de la modification';
      }
    }
  }
  $liste = $contact->select();
  echo $twig->render('contact-modif.html.twig', array('form'=>$form,'liste'=>$liste));
 }
?>
