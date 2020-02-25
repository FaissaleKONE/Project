  <?php
    $user = "root";
    $pass = "";
    $dbh = new PDO("mysql:host=localhost; dbname=dbuser", $user, $pass); 
    $ename = "";
    $lastname = "";
    $mail = "";

    $error_ename = "";
    $error_lastname = "";
    $error_mail = "";
    $error = 0;
    $output = "";
    session_start();

    if (empty($_POST["ename"])){
      $error_ename = "Renseigner le champ";
      $error++;
    }else{
      $ename = $_POST["ename"];
    }

    if (empty($_POST["lastname"])){
      $error_lastname = "Renseigner le champ";
      $error++;
    }else{
      $lastname = $_POST["lastname"];
    }

    if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
      $error_mail = "Renseigner un email valide";
      $error++;
    }
    else{
      $mail = $_POST["mail"];
    }
    
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
          $query = "insert into user(nom, prenom, email) values(?,?,?)";
          $statement2 = $dbh->prepare($query);
          $statement2->execute(array($ename,$lastname,$mail));
          
            $output = array(
              "success" => "Donnée inserer avec success",
            );
        }
      }
    }
    
    if ($error>0){
      $output = array(
        "error" => true,
        "error_ename" => $error_ename,
        "error_lastname" => $error_lastname,
        "error_mail" => $error_mail,
      );
    }
    
    echo json_encode($output);
  ?>