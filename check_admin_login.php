<?php
    //connection à la base de données 
    include "database_connexion.php";
    session_start();

    $email = '';
    $pass = '';
    $error_pass = '';
    $error_email = '';
    $error = 0;

    if(empty($_POST["email"])){
        $error_email = "Nom d'utilisateur requis";
        $error++;
    }else{
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error_email = 'Le format de cette adresse est invalide';
            $error++;
        }
        else{
            $email = $_POST['email'];
        }
    }

    if(empty($_POST["pass"])){
        $error_pass = "Mot de passe requis";
        $error++;
    }
    else{
        $pass = $_POST["pass"]; 
    }

    if($error == 0){
        //aucune erreur enregistrée
        $query = "
        SELECT * FROM admin WHERE email = '".$email."'
        ";

        $statement = $connect->prepare($query);
        if($statement->execute()){
            $total_row = $statement->rowCount();
            if($total_row > 0){
                $result = $statement->fetchAll();
                // recupere tout les administrateurs
                foreach($result as $row){
                    //on verifiy lequel des mot de passe correspond
                    if(password_verify($pass, $row['pass'])){
                        $_SESSION['admin_id'] = $row['id'];
                        $_SESSION['admin_email'] = $row['email'];
                        $_SESSION['admin_pass'] = $row['pass'];
                    }
                    else{
                        $error_pass = 'Mot de passe incorrect';
                        $error++;
                    }                        
                }

            }else{
                //Il y a erreur sur le user_name
                $error_email = 'Username ou Email incorrect';
                $error++;
            }
        }

    }
    if($error > 0){
        $output = array(
            'error' => true,
            'error_email' => $error_email,
            'error_pass' => $error_pass
        );
    }else{
        $output = array(
            'success' => true
        );
    }

    echo json_encode($output);





    function checkData($data){
        $data  =  trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>