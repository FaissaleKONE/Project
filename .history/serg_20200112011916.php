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
        
    } catch (HTML2PDF_exception $e){

    }
?>