<?php
    // extract(unserialize(file_get_contents ('datas.txt')));
    // ob_start();
?>

<!-- <table>
    <tr>
        <td>Salut Faissle</td>
    </tr>
</table> -->

<?php
    // $content = ob_get_clean();
    // require('html2pdf/html2pdf.class.php');
    // try{
    //     $pdf = new HTML2PDF('P','A4','fr');
    //     $pdf->pdf->SetDisplayMode('fullpage');
    //     $pdf->writeHTML($content);
    //     $pdf->Output(serg.pdf);
    // } catch (HTML2PDF_exception $e){
    //     die($e);
    // }
?>

<?php
    require __DIR__.'/vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;

    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
    $html2pdf->output();
?>