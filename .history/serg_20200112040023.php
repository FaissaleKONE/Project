<?php

    if (!empty($_POST['submit'])){
        $f_name = $_POST['First_Name'];
        $l_name = $_POST['Last_Name'];
        $genre = $_POST['Genre'];
        $date = $_POST['Date'];
        $mobile = $_POST['Mobile'];
        $email = $_POST['Email'];
    
    // require "fpdf/fpdf.php";
    include "fpdf/fpdf.php";

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,10,"Welcome {$f_name}" ,1,1,"C");

    $pdf->Cell(50,10,"First Name :",1,0);
    $pdf->Cell(60,10,$f_name,1,1);

    $pdf->Cell(50,10,"Last Name :",1,0);
    $pdf->Cell(60,10,$l_name,1,1);

    $pdf->Cell(50,10,"Genre :",1,0);
    $pdf->Cell(60,10,$genre,1,1);

    $pdf->Cell(50,10,"Date :",1,0);
    $pdf->Cell(60,10,$date,1,1);

    $pdf->Cell(50,10,"Mobile :",1,0);
    $pdf->Cell(60,10,$mobile,1,1);

    $pdf->Cell(50,10,"email :",1,0);
    $pdf->Cell(60,10,$email,1,1);

    $pdf->Output();
    
    }
?>