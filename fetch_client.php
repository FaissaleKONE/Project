<?php

    $serveur = "localhost";
    $login = "root";
    $pass = "";

    try {
        $dbh = new PDO ("mysql:host=$serveur;dbname=dbkone", $login, $pass);
        $dbh-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Variables 
        $people = "";
        $date = "";
        $time = "";
        $last_name = "";
        $first_name = "";
        $genre = "";
        $email = "";
        $phone = "";
        $phone2 = "";

        // Variables errors
        $error_people = "";
        $error_date = "";
        $error_time = "";
        $error_last_name = "";
        $error_first_name = "";
        $error_genre = "";
        $error_email = "";
        $error_phone = "";
        $error_phone2 = "";

        $error = 0;
        $output = "";
        session_start();

        // Number of people
        if (empty($_POST["people"])){
            $error_people = "Renseigner nombre personne";
            $error++;
        }else{
            $people = $_POST["people"];
        }

        // Date of reservation
        if (empty($_POST["date"])){
            $error_date = "Renseigner la date";
            $error++;
        }else{
            $date = $_POST["date"];
        }

        // Time of reservation
        if (empty($_POST["time"])){
            $error_time = "Renseigner l'heure";
            $error++;
        }else{
            $time = $_POST["time"];
        }

        // Last name client
        if (empty($_POST["last_name"])){
            $error_last_name = "Renseigner last name";
            $error++;
        }else{
            $last_name = $_POST["last_name"];
        }

        // First name client
        if (empty($_POST["first_name"])){
            $error_first_name = "Renseigner first name";
            $error++;
        }else{
            $first_name = $_POST["first_name"];
        }

        // Genre of client
        if (empty($_POST["genre"])){
            $error_genre = "Client de sexe Masculin ou Feminin ?";
            $error++;
        }else{
            $genre = $_POST["genre"];
        }

        // Email validate of client
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error_email = "Renseigner un email valide";
            $error++;
        }else{
            $email = $_POST["email"];
        }

        // Number_1 of client
        if(empty($_POST['phone'])){
            $error_phone = "Un Contact Téléphonique du client est requis";
            $error++;
        }else if(strlen($_POST['phone']) != 8 || !is_numeric($_POST['phone'])){
            $error_phone = "Exactement 8 chiffres sont requis";
            $error++;
        }else{
            $phone = $_POST['phone'];    
        }
    
        // Number_2 of client 
        if(empty($_POST['phone2'])){
            $error_phone2 = "Renseigner un numéro";
            $error++;
        }else if(strlen($_POST['phone2']) != 8 || !is_numeric($_POST['phone2'])){
            $error_phone2 = "Exactement 8 chiffres sont requis";
            $error++;
        }else{
            $phone2 = $_POST['phone2'];    
        }

        // Insertion of data base
        if($error == 0){
        $query = "SELECT * from client where email = '".$email."'
        ";
            $_SESSION['query'] = $query; 
            $statement = $dbh->prepare($query);
            if($statement->execute()){
                $total_row = $statement->rowCount();
                if($total_row > 0){
                    $result = $statement->fetchAll();
                    foreach($result as $row){
                        if($row['email'] == $email){
                            $error++;
                            $error_email = 'Ce utilisateur existe déjà';
                        }
                    }
                }
                else{
                    $query = "insert into client(nbpersonne, reservdate, heure, prenom, nom, sexe, email, telephone, telephone2) values(?,?,?,?,?,?,?,?,?)";
                    $statement2 = $dbh->prepare($query);
                    $statement2->execute(array($people,$date,$time,$last_name,$first_name,$genre,$email,$phone,$phone2));
                
                    $output = array(
                        "success" => "Reservation effectuée avec success",
                    );
                }
            }
        }
    
        // Part of errors
        if ($error>0){
            $output = array(
                "error" => true,
                "error_people" => $error_people,
                "error_date" => $error_date,
                "error_time" => $error_time,
                "error_last_name" => $error_last_name,
                "error_first_name" => $error_first_name,
                "error_genre" => $error_genre,
                "error_email" => $error_email,
                "error_phone" => $error_phone,
                "error_phone2" => $error_phone2,
            );
        }
    
        echo json_encode($output);

    }
    catch (PDOException $e) {
        echo 'Echec de la connection à la DB '.$e-> getMessage();
    }
?>