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
    <title>HVent|food</title>
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/styles-merged.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/style.min.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="favicon.ico">
    <!--===============================================================================================-->

    <style>
        /* scrollup */
            .scrollup {
                width: 30px;
                height: 30px;
                border-radius: 15px;
                opacity: .3;
                position: fixed;
                bottom: 20px;
                right: 25px;
                color: #fff;
                cursor: pointer;
                background-color: #000;
                z-index: 1000;
                transition: opacity .5s, background-color .5s;
                -moz-transition: opacity .5s, background-color .5s;
                -webkit-transition: opacity .5s, background-color .5s;
            }
            .scrollup:hover {
                background: #ff6863;
                opacity: 1;
            }
            .scrollup i {
                font-size: 13px;
                position: absolute;
                opacity: 1;
                color: #fff;
                left: 50%;
                top: 50%;
                margin-top: -7px;
                margin-left: -6px;
                text-decoration: none;
            }

        /*Preloader css*/
            #loading {
                background-color: #d14149;
                height: 100%;
                width: 100%;
                position: fixed;
                z-index: 1;
                margin-top: 0px;
                top: 0px;
                left: 0;
                z-index: 9999;
            }
            #loading-center {
                width: 100%;
                height: 100%;
                position: relative;
            }
            #loading-center-absolute {
                position: absolute;
                left: 50%;
                top: 50%;
                height: 150px;
                width: 150px;
                margin-top: -75px;
                margin-left: -75px;
                -ms-transform: rotate(45deg);
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
            }
            .object {
                width: 20px;
                height: 20px;
                background-color: #FFF;
                position: absolute;
                left: 65px;
                top: 65px;
                -moz-border-radius: 50% 50% 50% 50%;
                -webkit-border-radius: 50% 50% 50% 50%;
                border-radius: 50% 50% 50% 50%;
            }
            .object:nth-child(2n+0) {
                margin-right: 0px;
            }
            #object_one {
                -webkit-animation: object_one 2s infinite;
                animation: object_one 2s infinite;
                -webkit-animation-delay: 0.2s;
                animation-delay: 0.2s;
            }
            #object_two {
                -webkit-animation: object_two 2s infinite;
                animation: object_two 2s infinite;
                -webkit-animation-delay: 0.3s;
                animation-delay: 0.3s;
            }
            #object_three {
                -webkit-animation: object_three 2s infinite;
                animation: object_three 2s infinite;
                -webkit-animation-delay: 0.4s;
                animation-delay: 0.4s;
            }
            #object_four {
                -webkit-animation: object_four 2s infinite;
                animation: object_four 2s infinite;
                -webkit-animation-delay: 0.5s;
                animation-delay: 0.5s;
            }
            #object_five {
                -webkit-animation: object_five 2s infinite;
                animation: object_five 2s infinite;
                -webkit-animation-delay: 0.6s;
                animation-delay: 0.6s;
            }
            #object_six {
                -webkit-animation: object_six 2s infinite;
                animation: object_six 2s infinite;
                -webkit-animation-delay: 0.7s;
                animation-delay: 0.7s;
            }
            #object_seven {
                -webkit-animation: object_seven 2s infinite;
                animation: object_seven 2s infinite;
                -webkit-animation-delay: 0.8s;
                animation-delay: 0.8s;
            }
            #object_eight {
                -webkit-animation: object_eight 2s infinite;
                animation: object_eight 2s infinite;
                -webkit-animation-delay: 0.9s;
                animation-delay: 0.9s;
            }
            #object_big {
                position: absolute;
                width: 50px;
                height: 50px;
                left: 50px;
                top: 50px;
                -webkit-animation: object_big 2s infinite;
                animation: object_big 2s infinite;
                -webkit-animation-delay: 0.5s;
                animation-delay: 0.5s;
            }
            @-webkit-keyframes object_big {
                50% {
                    -webkit-transform: scale(0.5);
                }
            }
            @keyframes object_big {
                50% {
                    transform: scale(0.5);
                    -webkit-transform: scale(0.5);
                }
            }
            @-webkit-keyframes object_one {
                50% {
                    -webkit-transform: translate(-65px, -65px);
                }
            }
            @keyframes object_one {
                50% {
                    transform: translate(-65px, -65px);
                    -webkit-transform: translate(-65px, -65px);
                }
            }
            @-webkit-keyframes object_two {
                50% {
                    -webkit-transform: translate(0, -65px);
                }
            }
            @keyframes object_two {
                50% {
                    transform: translate(0, -65px);
                    -webkit-transform: translate(0, -65px);
                }
            }
            @-webkit-keyframes object_three {
                50% {
                    -webkit-transform: translate(65px, -65px);
                }
            }
            @keyframes object_three {
                50% {
                    transform: translate(65px, -65px);
                    -webkit-transform: translate(65px, -65px);
                }
            }
            @-webkit-keyframes object_four {
                50% {
                    -webkit-transform: translate(65px, 0);
                }
            }
            @keyframes object_four {
                50% {
                    transform: translate(65px, 0);
                    -webkit-transform: translate(65px, 0);
                }
            }
            @-webkit-keyframes object_five {
                50% {
                    -webkit-transform: translate(65px, 65px);
                }
            }
            @keyframes object_five {
                50% {
                    transform: translate(65px, 65px);
                    -webkit-transform: translate(65px, 65px);
                }
            }
            @-webkit-keyframes object_six {
                50% {
                    -webkit-transform: translate(0, 65px);
                }
            }
            @keyframes object_six {
                50% {
                    transform: translate(0, 65px);
                    -webkit-transform: translate(0, 65px);
                }
            }
            @-webkit-keyframes object_seven {
                50% {
                    -webkit-transform: translate(-65px, 65px);
                }
            }
            @keyframes object_seven {
                50% {
                    transform: translate(-65px, 65px);
                    -webkit-transform: translate(-65px, 65px);
                }
            }
            @-webkit-keyframes object_eight {
                50% {
                    -webkit-transform: translate(-65px, 0);
                }
            }
            @keyframes object_eight {
                50% {
                    transform: translate(-65px, 0);
                    -webkit-transform: translate(-65px, 0);
                }
            }

    </style>
</head>

<body>

    <!-- Start your project here-->

        <!-- Navbar & Welcome_The_Restaurant -->
        <?php include "profile/header_nav.php";?>
        
        <!-- Discover_Our_Store & Discover_Our_Specialties  -->
        <?php include "profile/ourStore_Specialties.php";?>

        <!-- Farther than or (Past) Discover_Our_Specialties -->
        <?php include "profile/our_specialities.php";?>

        <!-- Discover_Our_Menu -->
        <?php include "profile/discover_menu.php";?>

        <!-- Farther than or (Past) Discover_Our_Menu -->
        <?php include "profile/our_menu.php";?>

        <!-- Booking_Reserve_A_Table -->
        <?php include "profile/booking_reserve.php";?>

        <!-- Form_To_Reserve_A_Table -->
        <?php include "profile/reserve_table.php";?>

        <!-- Upcoming_Our_Events -->
        <?php include "profile/upcoming_events.php";?>

        <!-- Farther than or (Past) Upcoming_Our_Events & Contact_Let_s_Chat -->
        <?php include "profile/ourEvent_Contact.php";?>

        <!-- Locations_Open_Hours -->
        <?php include "profile/open_hours.php";?>

        <!-- Footer -->
        <?php include "profile/footer.php";?>

        <!-- Scroll up -->
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

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
                $('#register_form')[0].reset();
                $('#register_form #error_date').text('');
                $('#register_form #error_time').text('');
                $('#register_form #error_genre').text('');
                $('#register_form #error_phone').text('');
                $('#register_form #error_email').text('');
                $('#register_form #error_people').text('');
                $('#register_form #error_phone2').text('');
                $('#register_form #error_last_name').text('');
                $('#register_form #error_first_name').text('');
            }

            $('#register_form').on('submit', function(event) {
                event.preventDefault()

                $.ajax({
                    url: "fetch_client.php",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",

                    beforeSend: function() {
                        $("#c_submit").attr("disabled", "disabled")
                        $("#c_submit").val('Envoi en cours...')
                    },

                    success: function(data) {

                        if (data.success) {
                            $("#c_submit").attr("disabled", false);
                            $("#c_submit").val("envoyer");
                            restForm();
                            $("#message_register").html('<div class="alert alert-success">' + data.success + '</div>')
                        }

                        if (data.error) {
                            $("#c_submit").attr("disabled", false);
                            $("#c_submit").val("envoyer");

                            if (data.error_people != '') {
                                $("#error_people").text(data.error_people)
                            } else {
                                $("#error_people").text('')
                            }

                            if (data.error_date != '') {
                                $("#error_date").text(data.error_date)
                            } else {
                                $("#error_date").text('')
                            }

                            if (data.error_time != '') {
                                $("#error_time").text(data.error_time)
                            } else {
                                $("#error_time").text('')
                            }

                            if (data.error_last_name != '') {
                                $("#error_last_name").text(data.error_last_name)
                            } else {
                                $("#error_last_name").text('')
                            }

                            if (data.error_first_name != '') {
                                $("#error_first_name").text(data.error_first_name)
                            } else {
                                $("#error_first_name").text('')
                            }

                            if (data.error_genre != '') {
                                $("#error_genre").text(data.error_genre)
                            } else {
                                $("#error_genre").text('')
                            }

                            if (data.error_email != '') {
                                $("#error_email").text(data.error_email)
                            } else {
                                $("#error_email").text('')
                            }

                            if (data.error_phone != '') {
                                $("#error_phone").text(data.error_phone)
                            } else {
                                $("#error_phone").text('')
                            }

                            if (data.error_phone2 != '') {
                                $("#error_phone2").text(data.error_phone2)
                            } else {
                                $("#error_phone2").text('')
                            }

                        }
                    }
                })
            })
        }); //End of script reservation table

        $(document).ready(function() {

                function restForm() {
                    $('#form')[0].reset();
                    $('#form #error_mail').text('');
                    $('#form #error_ename').text('');
                    $('#form #error_lastname').text('');
                    $('#form #error_user_message').text('');
                }

                $('#form').on('submit', function(event) {
                    event.preventDefault()

                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: $(this).serialize(),
                        dataType: "json",

                        beforeSend: function() {
                            $("#submit_button").attr("disabled", "disabled")
                            $("#submit_button").val('Envoi en cours...')
                        },

                        success: function(data) {

                            if (data.success) {
                                $("#submit_button").attr("disabled", false);
                                $("#submit_button").val("envoyer");
                                restForm();
                                $("#message").html('<div class="alert alert-success">' + data.success + '</div>')
                            }

                            if (data.error) {
                                $("#submit_button").attr("disabled", false);
                                $("#submit_button").val("envoyer");

                                if (data.error_ename != '') {
                                    $("#error_ename").text(data.error_ename)
                                } else {
                                    $("#error_ename").text('')
                                }

                                if (data.error_lastname != '') {
                                    $("#error_lastname").text(data.error_lastname)
                                } else {
                                    $("#error_lastname").text('')
                                }

                                if (data.error_lastname != '') {
                                    $("#error_lastname").text(data.error_lastname)
                                } else {
                                    $("#error_lastname").text('')
                                }

                                if (data.error_mail != '') {
                                    $("#error_mail").text(data.error_mail)
                                } else {
                                    $("#error_mail").text('')
                                }

                                if (data.error_user_message != '') {
                                    $("#error_user_message").text(data.error_user_message)
                                } else {
                                    $("#error_user_message").text('')
                                }

                            }
                        }
                    })
                })
            }) //End of script send message
    </script>

</body>

</html>