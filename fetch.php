<?php

  $serveur = "localhost";
  $login = "root";
  $pass = "";

  try {
    $dbh = new PDO ("mysql:host=$serveur;dbname=dbkone", $login, $pass);
    $dbh-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Variables
    $ename = "";
    $lastname = "";
    $mail = "";
    $user_message = "";

    // Variables errors
    $error_ename = "";
    $error_lastname = "";
    $error_mail = "";
    $error_user_message = "";

    $error = 0;
    $output = "";
    session_start();

    // Last name client
    if (empty($_POST["ename"])){
      $error_ename = "Renseigner last name";
      $error++;
    }else{
      $ename = $_POST["ename"];
    }

    // First name client
    if (empty($_POST["lastname"])){
      $error_lastname = "Renseigner first name";
      $error++;
    }else{
      $lastname = $_POST["lastname"];
    }

    // Validate of email client
    if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
      $error_mail = "Renseigner un email valide";
      $error++;
    }
    else{
      $mail = $_POST["mail"];
    }

    // Message of admin
    if (empty($_POST["user_message"])){
      $error_user_message = "Renseigner message";
      $error++;
    }else{
      $user_message = $_POST["user_message"];
    }

    // Insertion of data base
    if($error == 0){
      $query = "SELECT * from user where email = '".$mail."'
      ";
        $_SESSION['query'] = $query; 
      $statement = $dbh->prepare($query);
      if($statement->execute()){
        $total_row = $statement->rowCount();
        if($total_row > 0){
          $result = $statement->fetchAll();
          foreach($result as $row){
            if($row['email'] == $mail){
              $error++;
              $error_mail = 'Ce utilisateur existe déjà';
            }
          }
        }
        else{
          $query = "insert into user(nom, prenom, email, message) values(?,?,?,?)";
          $statement2 = $dbh->prepare($query);
          $statement2->execute(array($ename,$lastname,$mail,$user_message));
          
            $output = array(
              "success" => "Message envoyé avec success",
            );
        }
      }
    }

    // Part of errors
    if ($error>0){
      $output = array(
        "error" => true,
        "error_ename" => $error_ename,
        "error_lastname" => $error_lastname,
        "error_mail" => $error_mail,
        "error_user_message" => $error_user_message,
      );
    }

    echo json_encode($output);
  }
  catch (PDOException $e) {
    echo 'Echec de la connection à la DB '.$e-> getMessage();
  }

?>