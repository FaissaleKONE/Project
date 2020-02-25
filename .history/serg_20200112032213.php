<?php

    if (!empty($_POST['submit'])){
        $f_name = $_POST['First_Name'];
        $l_name = $_POST['Last_Name'];
        $genre = $_POST['Genre'];
        $date = $_POST['Date'];
        $mobile = $_POST['Mobile'];
        $email = $_POST['Email'];
    
    require("fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(10,10"Welcome",0,0,C);
    $pdf->Output();
    
    }
?>