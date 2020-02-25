<?php
    extract(unserialize(file_get_content('datas.txt')));
    ob_start();
?>

<table>
    <tr>
        <td>Salut Faissle</td>
    </tr>
</table>

<?php
    $content = ob_get_clean();
    require('html2pdf/html2pdf.class.php');
    try{
        $pdf = new HTML2PDF('P','A4','fr');
        $pdf->pdf->SetDisplayMode('fullpage');
        $pdf->writeHTML($content);
        $pdf->Output(serg.pdf);
    } catch (HTML2PDF_exception $e){
        die($e);
    }
?>