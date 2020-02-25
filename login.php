<?php
    require_once("database_connexion.php");
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>HVent-Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->  
		<link rel="icon" type="image/png" href="favicon.ico">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css_c/bootstrap.min.css">
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
</head>

<body style="background-color: #666666;">

	<!-- Start your project here-->
	
		<!-- Login-connexion -->
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form" id="login100-form" action="" method="POST">
						<div class="jumbotron">
							<h2 class="text-center">CONNEXION / <br> CREER UN COMPTE</h3>
						</div>
						
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email" id="email">
							<span class="focus-input100"></span>
							<span class="label-input100">Email ou Nom Utilisateur</span>
						</div>
						<div id="error_email"></div>
						
						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" name="pass" id="pass">
							<span class="focus-input100"></span>
							<span class="label-input100">Mot de Passe</span>
						</div>
						<div id="error_pass"></div>

						<div class="flex-sb-m w-full p-t-3 p-b-32">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Se rappellez de moi
								</label>
							</div>

							<div>
								<a href="#" class="txt1">
									Mot de passe oublié?
								</a>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<input type="submit" id="admin_login" class="login100-form-btn" value="Connexion">
						</div>

						<hr style="width: 450px;">

						<div class="container-login100-form-btn">
							<a href="login_second.php" class="login100-form-btn" style="width: 250px; background: green;">Créer un compte</a>
						</div>

					</form>

					<div class="login100-more" style="background-image: url('img/background.jpg');"></div>
				</div>
			</div>
		</div>

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
            
            $("#login100-form").on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url : "check_admin_login.php",
                    method : "POST",
                    data : $(this).serialize(),
                    dataType : "json",
                    beforeSend : function(){
                        $("#admin_login").val("Connexion...")
                        $("#admin_login").attr('disabled', 'disabled')
                    },
                    success : function(data) {
                        if(data.success){
                            //redirection vers la page d'index
                            location.href = "<?php echo $base_url;?>"
						}

                        if(data.error){
                            $("#admin_login").val("Se connecter");
                            $("#admin_login").attr('disabled', false);
                            if(data.error_email != ''){
                                $('#error_email').text(data.error_email)
                                $('#error_email').addClass('alert alert-danger')
                            }else{
                                $('#error_email').text('');
                                $('#error_email').removeClass('alert alert-danger')
							}

                            if(data.error_pass != ''){
                                $('#error_pass').text(data.error_pass)
                                $('#error_pass').addClass('alert alert-danger')
                            }else{
                                $('#error_pass').text('');
                                $('#error_pass').removeClass('alert alert-danger')
                                
                            }
                        }

                    }

                })
            })
        });
	</script>
	
</body>

</html>