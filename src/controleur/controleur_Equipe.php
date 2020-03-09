<?php
function actionEquipe($twig, $db){
  $form = array();
  $equipe = new Equipe($db);

  if(isset($_GET['id'])){
    var_dump($_GET['id']);
 $exec=$equipe->delete($_GET['id']);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Problème de suppression dans la table equipe';
 }
 else{
 $form['valide'] = true;
 $form['message'] = 'equipe supprimé avec succès';
 }
 }
  $liste = $equipe->select();
echo $twig->render('equipe.html.twig', array('form'=>$form,'liste'=>$liste));
}
###################################################################
function actionEquipeAjout($twig, $db){
    $form = array();
    if (isset($_POST['btAjouter'])){
      $inputLibelle = $_POST['inputLibelle'];
      $inputIdResponsable = $_POST['inputIdResponsable'];
      $form['valide'] = true;
      $equipe = new Equipe($db);
      $exec = $equipe->insert($inputLibelle, $inputIdResponsable);
      if (!$exec){
        $form['valide'] = false;
        $form['message'] = 'Problème d\'insertion dans la table équipe ';
      }
    }
    else{
        $developpeur = new Developpeur($db);
        $liste = $developpeur->select();
        $form['liste'] = $liste;

    }

    echo $twig->render('equipe-ajout.html.twig', array('form'=>$form));
}
############################################################################""
function actionEquipeModif($twig, $db){
  $form = array();
  if(isset($_GET['id'])){
      $equipe = new Equipe($db);
       $developpeur = new Developpeur($db);
        $responsable = new Responsable($db);
  $uneEquipe = $equipe->selectById($_GET['id']);


  if ($uneEquipe!=null){

  $form['equipe'] = $uneEquipe;

  }
  else{
  $form['message'] = 'libelle incorrect';
  }
  }
   else{
  if (isset($_POST['btModifier'])){
   $equipe = new Equipe($db);
    $developpeur = new Developpeur($db);
        $responsable = new Responsable($db);
   $id = $_POST['id'];
   $libelle = $_POST['inputLibelle'];
   $idResponsable = $_POST['inputIdResponsable'];

  $form['valide'] = true;
  $form['message'] = 'Modification réussie ';
  $exec=$equipe->update($id,$libelle,$idResponsable);
  if(!$exec){
  $form['valide'] = false;
  $form['message'] = 'Échec de la modification';
  }

  }
   }
 $liste = $equipe->select();

 $listeD = $developpeur->select();
 $listeR = $responsable->select();
 echo $twig->render('equipe-modif.html.twig', array('form'=>$form,'liste'=>$liste,'listeD'=>$listeD,'listeR'=>$listeR));
}


// WebService
function actionEquipeWS($twig, $db){
   $equipe = new Equipe($db);
   $json = json_encode($liste = $equipe->select());
   echo $json;
}
?>
