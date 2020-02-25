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
            if(empty($_POST['student_phone'])){
                $error_phone = "Un Contact Téléphonique du client est requis";
                $error++;
            }else if(strlen($_POST['student_phone']) != 8 || !is_numeric($_POST['student_phone'])){
                $error_phone = "Exactement 8 chiffres sont requis";
                $error++;
            }else{
                $student_phone = $_POST['student_phone'];    
            }

            // Phone2 client
            if(empty($_POST['parent_phone1'])){
                $error_phone2 = "Un contact téléphonique d'un proche est requis";
                $error++;
            }else if(strlen($_POST['parent_phone1']) != 8 || !is_numeric($_POST['parent_phone1'])){
                $error_phone2 = "Exactement 8 chiffres sont requis";
                $error++;
            }else{
                $parent_phone1 = $_POST['parent_phone1'];
            }
            
            // phone2 parent
            if(!empty($_POST['parent_phone2']) && (strlen($_POST['parent_phone2']) != 8 || !is_numeric($_POST['parent_phone2']))){
                $error_parent_phone2 = "Champs facultatif mais - 8 chiffres requis à la saisie";
                $error++;
            }else{
                $parent_phone2 = $_POST['parent_phone2'];
            }

            // classe etudiant
            if(empty($_POST['classe'])){
                $error_classe = "Selectionner la classe de l'etudiant";
                $error++;
            }else{
                $classe = $_POST['classe'];
            }

            if($error == 0){
                    $query = "
                    SELECT * FROM student WHERE student_phone = '".$student_phone."'
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                
                    $total_row = $statement->rowCount();
                    if($total_row > 0){
                        // L'etudiant existe déja
                        $result = $statement->fetchAll();
                        foreach($result as $row){
                            //$_SESSION['ligne'] = $row['student_phone'];

                            if($row['student_phone'] == $student_phone){
                                $error_student_phone = "Cet Etudiant existe déjà";
                                $error++;
                            }

                        }
                    }else{
                        $query = "
                        insert into student(student_first_name,student_last_name,student_phone,student_sexe,student_situation,parent_phone1,parent_phone2,student_email_parent) values(?,?,?,?,?,?,?,?)
                        ";
                        $statement = $connect->prepare($query);
                        if ($statement->execute(array($student_first_name,$student_last_name,$student_phone,$student_sexe,$student_situation,$parent_phone1,$parent_phone2,$student_email_parent))){
                            $output = array(
                                "success" => "Les données prêtes à être exploitées",
                            );
                        }
                    }
                }
        
        if($error > 0){
            $output = array(
                "error"  => true,
                "error_student_first_name"  => $error_student_first_name,
                "error_student_last_name"   => $error_student_last_name,
                // "error_student_email_parent"  => $error_student_email_parent,
                // "error_student_birthday"  => $error_student_birthday,
                // "error_student_date_saved"  => $error_student_date_saved--,
                "error_student_phone"  => $error_student_phone,
                "error_student_sexe"    => $error_student_sexe,
                "error_student_situation"  => $error_student_situation,
                "error_parent_phone1"  => $error_parent_phone1,
                "error_parent_phone2"  => $error_parent_phone2,
                "error_classe"   => $error_classe,
            );
        }

        echo json_encode($output);
?>