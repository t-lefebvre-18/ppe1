<?php

function actionAccueil($twig, $db){
    $form = array(); 
    $form['valide'] = true;
    if (isset($_POST['btConnecter'])){
        $inputEmail = $_POST['inputEmail'];
        $inputPassword = $_POST['inputPassword'];  
        $utilisateur = new Utilisateur($db);
        $unUtilisateur = $utilisateur->connect($inputEmail);
        if ($unUtilisateur!=null){
          if(!password_verify($inputPassword,$unUtilisateur['mdp'])){
              $form['valide'] = false;
              $form['message'] = 'Login ou mot de passe incorrect';
          }  
          else{
           $_SESSION['login'] = $inputEmail;     
           $_SESSION['role'] = $unUtilisateur['idRole'];
           header("Location:index.php");
          } 
        }
        else{
           $form['valide'] = false;
           $form['message'] = 'Login ou mot de passe incorrect';
          
        }
    }
    echo $twig->render('index.html.twig', array('form'=>$form));
}




function actionMentions($twig){
    echo $twig->render('mentions.html.twig', array());
}

function actionApropos($twig){
    echo $twig->render('apropos.html.twig', array());
}

function actionMaintenance($twig){
    echo $twig->render('maintenance.html.twig', array());
}
?>
