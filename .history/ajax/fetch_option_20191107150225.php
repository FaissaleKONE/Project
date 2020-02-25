<?php
//fetch.php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=dbschool", "root", "");    

if(isset($_POST["action"]))
{
    //  $connect = new PDO('mysql:host=localhost;dbname=id10375102_zoom', "id10375102_hico", "mamson");
    // require_once "database_connexion.php" ;
    // $connect = new PDO("mysql:host=localhost;dbname=dbschoo", "root", "");    

    $output = '';
    if($_POST["action"] == "institut")
    {
        // $institut=$_POST[]
        // $query = "SELECT niveau FROM inst_fil_class WHERE institut = '".$_POST["query"]."' GROUP BY niveau";
        $query = "
        SELECT niveau FROM inst_fil_class WHERE institut = ? GROUP BY niveau
        ";
        $result = $connect->prepare($query);
        $result->execute([$_POST["query"]]);
        $output .= '<option value="">Selectionner le Niveau</option>';
        while($row = $result->fetch())
        {
            $output .= '<option value="'.$row["niveau"].'">'.$row["niveau"].'</option>';
        }
    }
    if($_POST["action"] == "niveau")
    {
        // $query = "SELECT classe FROM inst_fil_class WHERE niveau = '".$_POST["query"]."'";
        $query = "
        SELECT classe FROM inst_fil_class WHERE niveau = ? AND institut= ?
        ";
        $result = $connect->prepare($query);
        $result->execute([$_POST["query"], $_POST["institut"]]);
        $output .= '<option value="">Selectionner la Classe</option>';
        while($row = $result->fetch())
        {
            $output .= '<option value="'.$row["classe"].'">'.$row["classe"].'</option>';
        }
    }
    echo $output;
}

    // variables
        $student_first_name = "";
        $student_last_name = "";
        $student_email_parent = "";
        // $student_birthday = "";
        // $student_date_saved = "";
        $student_phone = "";
        $student_sexe = "";
        $student_situation = "";
        $parent_phone1 = "";
        $parent_phone2 = "";
        $classe = "";

    // errors variables
        $error_student_first_name = "";
        $error_student_last_name = "";
        // $error_student_email_parent = "";
        // $error_student_birthday = "";
        // $error_student_date_saved = "";
        $error_student_phone = "";
        $error_student_sexe = "";    
        $error_student_situation = "";
        $error_parent_phone1 = "";
        $error_parent_phone2 = "";
        $error_classe = "";
    
    $output = array();
    $error = 0;
        
        // prenom etudiant
        if(empty($_POST['student_first_name'])){
            $error_student_first_name = "Prénom d'etudiant requis";
            $error++;
        }else{
            $student_first_name = $_POST['student_first_name'];
        }

        // nom etudiant
        if(empty($_POST['student_last_name'])){
            $error_student_last_name = "Nom d'etudiant requis";
            $error++;
        }else{
            $student_last_name = $_POST['student_last_name'];
        }

        // email parent etudiant
        // if(empty($_POST['student_email_parent'])){
        //     $error_student_email_parent = "";
        //     $error++;
        // }else{
        //     $student_email_parent = $_POST['student_email_parent'];
        // }
                
        // date naissance etudiant
        // if(empty($_POST['student_birthday'])){
        //     $error_student_birthday = "La date de naissance est requise";
        //     $error++;
        // }else{
        //     $student_birthday = $_POST['student_birthday'];
        // }

        // date saved etudiant
        // if(empty($_POST['student_date_saved'])){
        //     $error_student_date_saved = "";
        //     $error++;
        // }else{
        //     $student_date_saved = $_POST['student_date_saved'];
        // }

        // phone etudiant
        if(empty($_POST['student_phone'])){
            $error_student_phone = "Un Contact Téléphonique de l'etudiant est requis";
            $error++;
        }else if(strlen($_POST['student_phone']) != 8 || !is_numeric($_POST['student_phone'])){
            $error_student_phone = "Exactement 8 chiffres sont requis";
            $error++;
        }else{
            $student_phone = $_POST['student_phone'];    
        }

        // sexe etudiant
        if(empty($_POST['student_sexe'])){
            $error_student_sexe = "Etudiant de sexe Masculin ou Feminin ?";
            $error++;
        }else{
            $student_sexe = $_POST['student_sexe'];
        }
        
        // habitation etudiant
        if(empty($_POST['student_situation'])){
            $error_student_situation = "Lieu d'habitation requise";
            $error++;
        }else{
            $student_situation = $_POST['student_situation'];
        }

        // phone1 parent
        if(empty($_POST['parent_phone1'])){
            $error_parent_phone1 = "Un contact téléphonique du parent de l'etudiant est requis";
            $error++;
        }else if(strlen($_POST['parent_phone1']) != 8 || !is_numeric($_POST['parent_phone1'])){
            $error_parent_phone1 = "Exactement 8 chiffres sont requis";
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