<?php

  $serveur = "localhost";
  $login = "root";
  $pass = "";

  try {
    $dbh = new PDO ("mysql:host=$serveur;dbname=dbkone", $login, $pass);
    $dbh-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Variables
    $pseudo = "";
    $email = "";
    $email2 = "";
    $mdp = "";
    $mdp2 = "";
    $pwd = "";

    // Variables errors
    $error_pseudo = "";
    $error_email = "";
    $error_email2 = "";
    $error_mdp = "";
    $error_mdp2 = "";

    $error = 0;
    $output = "";
    $pseudolength = "";
    session_start();

    // Pseudo client
    if (empty($_POST["pseudo"])) {
      $error_pseudo = "Renseigner votre pseudo";
      $error++;
    }else{
      $pseudo = $_POST["pseudo"];
      $pseudolength = strlen($_POST["pseudo"]);
    }

    // Validate of email client
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $error_email = "Renseigner un email valide";
      $error++;
    }else{
      $email = $_POST["email"];
    }

    // Confirm email of email client
    if (!filter_var($_POST["email2"], FILTER_VALIDATE_EMAIL)) {
      $error_email2 = "Confirmer votre email";
      $error++;
    }else{
      $email2 = $_POST["email2"];
    }

    // Password admin
    if (empty($_POST["mdp"])){
      $error_mdp = "Renseigner un mot de passe";
      $error++;
    }else{
      $mdp = $_POST["mdp"];
    }

    // Confirm password admin
    if (empty($_POST["mdp2"])){
      $error_mdp2 = "Confirmer votre mot de passe";
      $error++;
    }else{
      $mdp2 = $_POST["mdp2"];
    }

    if ($pseudolength <= 225) {

      if ($email == $email2) {
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          
          $extemail = $dbh->prepare("
            SELECT * FROM admin WHERE email = ?"
          );
          $extemail->execute(array($email));
          $emailverif = $extemail->rowCount();

          if ($emailverif == 0) {

            if ($mdp == $mdp2) {

              if ($error == 0) {

                if (!empty($mdp)) {

                  $pwd = password_hash($mdp, PASSWORD_BCRYPT);
                
                  // Insertion of data base
                  $query = $dbh->prepare("
                  INSERT INTO admin (adminename, email, pass) VALUES(?, ?, ?)"
                  );
                  $query->execute(array($_POST["pseudo"], $email, $pwd));

                  $output = array(
                    "success" => "Compte crée avec success",
                  );
                }

              }

            } else {
                $error_mdp2 = "Vos mots de passes ne correspondent pas !";
              }

          } else {
              $error_email = "Adresse email déjà utilisée !";
            }
        } else {
            $error_email = "Votre adresse email n'est pas valide !";
          }
      } else {
          $error_email2 = "Vos adresses email ne correspondent pas !";
        }
    } 
    else {
      $error_pseudo = "Votre pseudo ne doit pas être inférieur à 225 caractères !";
    }

    // Part of errors
    if ($error > 0){
      $output = array(
        "error" => true,
        "error_pseudo" => $error_pseudo,
        "error_email" => $error_email,
        "error_email2" => $error_email2,
        "error_mdp" => $error_mdp,
        "error_mdp2" => $error_mdp2,
      );
    } 
    else {
      $output = array(
        'success' => "Compte crée avec success",
      );
    }

    echo json_encode($output);


    
    function checkData($data){
      $data  =  trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  }

  catch (PDOException $e) {
    echo 'Echec de la connection à la DB '.$e-> getMessage();
  }

?>