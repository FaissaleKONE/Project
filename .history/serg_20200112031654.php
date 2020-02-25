<?php

if (!empty($_POST['submit'])){
    $f_name = $_POST['']
    $l_name = $_POST['']
    
}
    require("fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(10,10"Welcome",0,0,C);
    $pdf->Output();
?>