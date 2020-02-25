<?php
    require_once("database_connexion.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HVent-Inscription</title>
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/styles-merged.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/style.min.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="favicon.ico">
    <!--===============================================================================================-->
</head>

<body>

    <!-- Start your project here-->

        <!-- Login-Inscription -->
        <section class="probootstrap-section probootstrap-bg-white">
            <div class="container" style="margin-top: -9.5rem; margin-bottom: -6rem">
                <div class="row">
                    <div class="col-md-5 text-center probootstrap-animate">
                        <div class="probootstrap-heading dark">
                            <img src="img/background.jpg" style="width: 55rem; height: 60rem; border-radius: 15%;">
                        </div>
                    </div>

                    <div class="col-md-6 col-md-push-1 probootstrap-animate">
                        <h2 style="text-align: center; line-height: 15px;">Inscription</h2>
                        <span style="margin-left: 21.5rem;">C'est rapide et facile</span>

                        <br>
                        <br>

                        <form method="POST" action="" class="probootstrap-form" id="form">
                            <div id="message"></div>

                            <div class="row">
                                <!-- Pseudo_Client col-md-4 -->
                                <div class="#">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <i class="icon icon-user2"></i>
                                            <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Votre Pseudo">
                                            <div id="error_pseudo" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email_Client col-md-4 -->
                                <div class="#">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <i class="icon icon-mail"></i>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Votre email">
                                            <div id="error_email" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm_email_client col-md-4 -->
                                <div class="#">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <i class="icon icon-mail"></i>
                                            <input type="email" id="email2" name="email2" class="form-control" placeholder=" Confirmer votre email">
                                            <div id="error_email2" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password_client col-md-4 -->
                                <div class="#">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <i class="icon fa fa-lock"></i>
                                            <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Votre mot de passe">
                                            <div id="error_mdp" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm_Password_client col-md-4 -->
                                <div class="#">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <i class="icon fa fa-lock"></i>
                                            <input type="password" id="mdp2" name="mdp2" class="form-control" placeholder="Confirmez votre mot de passe">
                                            <div id="error_mdp2" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Button submit col-md-4 col-md-offset-4 -->
                            <div class="row">
                                <div class="form-group" style="margin-left: 15rem;">
                                    <input type="submit" id="submitform" name="submitform" value="S'inscrire" class="btn btn-lg btn-primary btn-block" style="width: 70%!important; background: green">
                                </div>
                                
                                <div class="form-group">
							        <a href="login.php" class="btn btn-lg btn-primary btn-block" style="width: 30%!important; margin-left: 22rem; background: blue">Connexion</a>
                                </div>

                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include "profile/footer.php";?>

    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!--===============================================================================================-->
        <script src="js/scripts.min.js"></script>
    <!--===============================================================================================-->
        <script src="js/custom.min.js"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.js"></script>
    <!--===============================================================================================-->
    <script>
        $(document).ready(function() {

            function restForm() {
                $('#form')[0].reset();
                $('#form #error_mdp').text('');
                $('#form #error_mdp2').text('');
                $('#form #error_email').text('');
                $('#form #error_pseudo').text('');
                $('#form #error_email2').text('');
            }

            $('#form').on('submit', function(event) {
                event.preventDefault()

                $.ajax({
                    url: "fetch_login_second.php",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",

                    beforeSend: function() {
                        $("#submitform").attr("disabled", "disabled")
                        $("#submitform").val('Inscription en cours...')
                    },

                    success: function(data) {
                        if (data.success) {                            
                            $("#submitform").attr("disabled", false);
                            $("#submitform").val("S'inscrire");
                            restForm();
                            $("#message").html('<div class="alert alert-success">' + data.success + '</div>')
                        
                            //redirection vers la page de connexion(echo "pay_replay.php")  
                            location.href = "<?php echo $base_url;?>"
                        }
                                                

                        if (data.error) {
                            $("#submitform").attr("disabled", false);
                            $("#submitform").val("S'inscrire");

                            if (data.error_pseudo != '') {
                                $("#error_pseudo").text(data.error_pseudo)
                            } else {
                                $("#error_pseudo").text('')
                            }

                            if (data.error_email != '') {
                                $("#error_email").text(data.error_email)
                            } else {
                                $("#error_email").text('')
                            }

                            if (data.error_email2 != '') {
                                $("#error_email2").text(data.error_email2)
                            } else {
                                $("#error_email2").text('')
                            }

                            if (data.error_mdp != '') {
                                $("#error_mdp").text(data.error_mdp)
                            } else {
                                $("#error_mdp").text('')
                            }

                            if (data.error_mdp2 != '') {
                                $("#error_mdp2").text(data.error_mdp2)
                            } else {
                                $("#error_mdp2").text('')
                            }

                        }
                    }
                })
            })
        }) //End of script register client
    </script>

</body>

</html>