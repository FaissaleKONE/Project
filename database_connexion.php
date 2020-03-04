<?php
    $connect = new PDO("mysql:host=localhost;dbname=dbhvente", "root", "");    
    $base_url = "index.php";

    function fill_unit_select_box($connect) {
        $output = "";
        $query = "SELECT * FROM tbl_unit ORDER BY unit_name ASC";
        $statement = $connect->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        foreach($result as $row) {
            $output .= '<option value ="'.$row["unit_name"].'">'.$row["unit_name"].'</option>';
        }
        return $output;
    }
?>