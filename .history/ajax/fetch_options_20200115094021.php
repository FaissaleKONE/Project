<?php
    session_start();
    
    $server = "localhost";
    $login = "root";
    $pass = "";

    $connect = new PDO("mysql:host=$server;dbname=", $login, $pass);

        // variables
        $people = "";
        $date = "";
        $time = "";
        $L_name = "";
        $F_name = "";
        $sexe = "";
        $email = "";
        $phone = "";
        $phone2 = "";

        // errors variables
        $error_people = "";
        $error_date = "";
        $error_time
        $error_last_name = "";
        $error_first_name = "";
        $error_sexe = "";
        $error_email = "";
        $error_phone = "";
        $error_phone2 = "";

        $output = array();
        $error = 0;
            
            // Nombre de personne
            if(empty($_POST['people'])){
                $error_people = "Nombre de personne requis";
                $error++;
            }else{
                $people = $_POST['people'];
            }

            // Date de reservation
            if(empty($_POST['date'])){
                $error_date = "La date requise";
                $error++;
            }else{
                $date = $_POST['date'];
            }

            // Heure de reservation
            if(empty($_POST['time'])){
                $error_time = "Heure de reservation requise";
                $error++;
            }else{
                $time = $_POST['time'];
            }
                    
            // Nom client
            if(empty($_POST['L_name'])){
                $error_last_name = "Nom est requis";
                $error++;
            }else{
                $L_name = $_POST['L_name'];
            }

            // Prenom client
            if(empty($_POST['F_name'])){
                $error_first_name = "Prénom est requis";
                $error++;
            }else{
                $F_name = $_POST['F_name'];
            }

            // Sexe client
            if(empty($_POST['sexe'])){
                $error_sexe = "Client de sexe Masculin ou Feminin ?";
                $error++;
            }else{
                $sexe = $_POST['sexe'];
            }

            // Email client
            if(empty($_POST['email'])){
                $error_email = "Email est requis";
                $error++;
            }else{
                $email = $_POST['email'];
            }

            // Phone client
            if(empty($_POST['phone'])){
                $error_phone = "Un Contact Téléphonique du client est requis";
                $error++;
            }else if(strlen($_POST['phone']) != 8 || !is_numeric($_POST['phone'])){
                $error_phone = "Exactement 8 chiffres sont requis";
                $error++;
            }else{
                $phone = $_POST['phone'];    
            }
            
            // Phone2 client
            if(!empty($_POST['phone2']) && (strlen($_POST['phone2']) != 8 || !is_numeric($_POST['phone2']))){
                $error_phone2 = "Champs facultatif mais - 8 chiffres requis à la saisie";
                $error++;
            }else{
                $phone2 = $_POST['phone2'];
            }

            if($error == 0){
                    $query = "
                    SELECT * FROM client WHERE phone = '".$phone."'
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                
                    $total_row = $statement->rowCount();
                    if($total_row > 0){
                        // Client existe déja
                        $result = $statement->fetchAll();
                        foreach($result as $row){
                            //$_SESSION['ligne'] = $row['phone'];

                            if($row['phone'] == $student_phone){
                                $error_phone = "Cet client existe déjà";
                                $error++;
                            }

                        }
                    }else{
                        $query = "
                        insert into client(people,date,time,L_name,F_name,sexe,email,phone,phone2) values(?,?,?,?,?,?,?,?,?)
                        ";
                        $statement = $connect->prepare($query);
                        if ($statement->execute(array($people,$date,$time,$L_name,$F_name,$sexe,$email,$phone,$phone2))){
                            $output = array(
                                "success" => "Super reservation good",
                            );
                        }
                    }
                }
        
        if($error > 0){
            $output = array(
                "error"  => true,
                "error_people" => $error_people,
                "error_date" => $error_date,
                "error_time" => $error_time,
                "error_last_name" => $error_last_name,
                "error_first_name" => $error_first_name,
                "error_sexe" => $error_sexe,
                "error_email" => $error_email,
                "error_phone" => $error_phone,
                "error_phone2" => $error_phone2,
            );
        }

        echo json_encode($output);
?>