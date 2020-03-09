 <?php
 function actionTache($twig, $db){

   $form = array();
   $tache = new Tache($db);
   if(isset($_POST['btSupprimer'])){

     $cocher = $_POST['cocher'];
     $form['valide'] = true;
     foreach ( $cocher as $id){

       $exec=$tache->delete($id);
       if (!$exec){

         $form['valide'] = false;
         $form['message'] = 'Problème de suppression dans la table Tache';
       }
     }
   }
   if(isset($_GET['id'])){

     $exec=$tache->delete($_GET['id']);
     if (!$exec){

       $form['valide'] = false;
       $form['message'] = 'Problème de suppression dans la table Tache';
     }
     else{

       $form['valide'] = true;
       $form['message'] = 'Tache supprimé avec succès';
     }
   }
   $liste = $tache->select();
   echo $twig->render('tache.html.twig', array('form'=>$form,'liste'=>$liste));
 }
################################################################################
function actionTacheAjout($twig, $db){

  $form = array();
  $tache = new Tache($db);
  if (isset($_POST['btAjouter'])){

    $inputLibelle = $_POST['inputLibelle'];
    $inputNbHeure = $_POST['inputNbHeure'];
    $inputCoupTache = $_POST['inputCoupTache'];
    $form['valide'] = true;
    $form['messageTitre'] = 'Tache ajoutée';
    $form['message'] = 'Le libelle pour Tache a bien été ajouter !';
    $exec = $tache->insert($inputLibelle,$inputNbHeure,$inputCoupTache);
    if (!$exec){

      $form['valide'] = false;
      $form['messageTitre'] = 'Echec de l\'ajout';
      $form['message'] = 'Le libelle pour Tache na pas put être ajouté !';
    }
  }
  $liste = $tache->select();
  echo $twig->render('tache-ajout.html.twig', array('form'=>$form,'liste'=>$liste));
}
################################################################################
function actionTacheModif($twig, $db){

  $form = array();
  if(isset($_GET['id'])){

    $tache = new Tache($db);
    $uneTache = $tache->selectById($_GET['id']);
    if ($uneTache!=null){$form['tache'] = $uneTache;}
    else{$form['message'] = 'libelle incorrect';}
  }
  else{

    if (isset($_POST['btModifier'])){

      $tache = new Tache($db);
      $inputLibelle = $_POST['inputLibelle'];
      $inputNbHeure = $_POST['inputNbHeure'];
      $inputCoupTache = $_POST['inputCoupTache'];
      $id = $_Post['id'];
      $form['valide'] = true;
      $form['message'] = 'Modification réussie';
      $exec=$tache->update($inputLibelle,$inputNbHeure,$inputCoupTache,$id);
      if(!$exec){

        $form['valide'] = false;
        $form['message'] = 'Échec de la modification';
      }
    }
  }
  $liste = $tache->select();
  echo $twig->render('tache-modif.html.twig', array('form'=>$form,'liste'=>$liste));
 }
 ?>
