<?php

function actionProjet($twig, $db){
    $form = array();
    $projet = new Projet($db);

    if(isset($_GET['id'])){
        $exec=$projet->delete($_GET['id']);
        if (!$exec){
            $form['valide'] = false;
            $form['message'] = 'Problème de suppression dans la table projet';
        }
        else{
            $form['valide'] = true;
        }
        $form['message'] = 'Equipe supprimée avec succès';
     }

    $liste = $projet->select();
    echo $twig->render('projet.html.twig', array('form'=>$form,'liste'=>$liste));
}

function actionProjetAjout($twig, $db){
    $form = array();
    if (isset($_POST['btAjouter'])){
      $inputCharge = $_POST['inputCharge'];

      $form['valide'] = true;
      $projet = new Projet($db);
      $exec = $projet->insert($inputCharge, $inputIdModule);
      if (!$exec){
        $form['valide'] = false;
        $form['message'] = 'Problème d\'insertion dans la table projet ';
      }else {
          $form['message'] = 'Erreur ';
        }
    }


    echo $twig->render('projet-ajout.html.twig', array('form'=>$form));
}

function actionProjetModif($twig, $db){
    $form = array();
    if(isset($_GET['id'])){
        $projet = new Projet($db);
        $unProjet = $projet->selectById($_GET['id']);

        if ($unProjet!=null){
            $form['projet'] = $unProjet;



        }
        else{
            $form['message'] = 'Projet incorrecte';
        }
    }
    else{
        if(isset($_POST['btModifier'])){
          $id = $_POST['id'];
          $inputCharge = $_POST['inputCharge'];



          $projet = new Projet($db);
          $exec = $projet->update($id, $inputCharge,$inputIdModule);
          if(!$exec){
                $form['valide'] = false;
                $form['message'] .= 'Echec de la modification du projet';
          }
          else{
            $form['valide'] = true;
            $form['message'] = 'Modification réussie';
          }

        }


    }

    echo $twig->render('projet-modif.html.twig', array('form'=>$form));
}

?>
