<?php
    require_once("database_connexion.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>HVent-Commande</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
        <link rel="icon" type="image/png" href="favicon.ico">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!--===============================================================================================-->
		<!-- <link rel="stylesheet" type="text/css" href="css_c/bootstrap.min.css"> -->
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor_c/animate/animate.css">
	<!--===============================================================================================-->  
		<link rel="stylesheet" type="text/css" href="vendor_c/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css_c/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor_c/select2/select2.min.css">
	<!--===============================================================================================-->  
		<link rel="stylesheet" type="text/css" href="vendor_c/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css_c/util.css">
		<link rel="stylesheet" type="text/css" href="css_c/main.css">
	<!--===============================================================================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <!--===============================================================================================-->
</head>

<body data-spy="scroll" data-target=".navbar-collapse">

    <!-- Start your project here-->

        <!-- commandes plats margin-bottom: 18.5rem;-->
        <div class="container" style="background: white">

            <h3 align="center">PASSER VOTRE COMMANDE ICI</h3> <br>
            
            <h4 align="center">ENTRER LES PLATS QUE VOUS DESIREZ COMMANDER</h4> <br>

            <form action="" method="POST" id="insert_form">
                <div class="table-responsive">

                    <span id="error"></span>

                    <table class="table table-bordered" id="item_table">
                        <tr>
                            <th style="text-align:center;">Entrer nom plat</th>
                            <th style="text-align:center;">Entrer nombre de plat</th>
                            <th style="text-align:center;">Sélectionner prix</th>

                            <th style="text-align:center;">
                                <button type="button" name="add" class="btn btn-success btn-sm add">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </th>
                        </tr>

                    </table> <br>

                    <div align="center">
                        <input type="submit" name="submit" class="btn btn-info" value="Soumettre la commande">
                    </div>
                    
                    <br>
                    <br>
                </div>
            </form>

            <!-- Bottom_bye -->
            <div class="row">
                <div class="form-group">
                    <a href="pay_type.php">
                        <input type="submit" id="submitform" value="Paiement sécurisé" class="btn btn-lg btn-primary btn-block" style="width: 25%!important; margin-left: 44rem">
                    </a>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
        </div>

        <!-- Footer -->
        <?php include "profile/footer.php";?>
    
    <!-- /Start your project here-->
    
	<!-- SCRIPTS -->
	<!--===============================================================================================-->
        <script src="vendor_c/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="js_c/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="js_c/popper.js"></script>
		<script src="js_c/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor_c/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor_c/daterangepicker/moment.min.js"></script>
		<script src="vendor_c/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="vendor_c/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="js_c/main.js"></script>
	<!--===============================================================================================-->   

    <script>
        $(document).ready(function(){
            $(document).on('click', '.add', function() {
                var html = "";
                html += '<tr>';
                html += '<td><input type="text" name="item_name[]" class="form-control item_name"> </td>';
                html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity"> </td>';
                html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Prix unitaire</option><?php echo fill_unit_select_box($connect);?></select></td>';
                html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
                html += '</tr>';

                $("#item_table").append(html);

            });

            $(document).on('click', '.remove', function() {
                $(this).closest('tr').remove();
            });

            $("#insert_form").on('submit', function(event) {
                event.preventDefault();
                var error = "";

                $(".item_name").each(function() {
                    var count = 1;
                    if ($(this).val() == "") {
                        error += "<p>Entrer nom plat "+count+" Ligne</p>";
                        return false;
                    }
                    count = count + 1;
                });

                $(".item_quantity").each(function() {
                    var count = 1;
                    if ($(this).val() == "") {
                        error += "<p>Entrer nombre de plat "+count+" Ligne</p>";
                        return false; 
                    }
                    count = count + 1;
                });

                $(".item_unit").each(function() {
                    var count = 1;
                    if ($(this).val() == "") {
                        error += "<p>Prix unitaire"+count+" Ligne</p>";
                        return false;
                    }
                    count = count + 1; 
                });

                var form_data = $(this).serialize();
                if (error == "") {
                    $.ajax({
                        url: "insert.php",
                        method: "POST",
                        data: form_data,
                        success: function(data) {
                            if (data == "OK") {
                                $("#item_table").find("tr:gt(0)").remove();
                                $("#error").html("<div class='alert alert-success'>Détails de commande sauvegardés</div>");
                            }
                        }
                    });
                } else {
                    $("#error").html("<div class='alert alert-danger'>"+error+"</div>");
                }

            });

        });
    </script>

</body>

</html>