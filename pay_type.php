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
    <title>HVent-Paiement</title>
    <!--===============================================================================================-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" href="css/styles-merged.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" href="css/style.min.css">
    <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="favicon.ico">
    <!--===============================================================================================-->
        <link rel="stylesheet" href="flaticon.css" />

        <style>
            /* Container */
            .container {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto
            }

            @media (min-width:576px) {
                .container {
                    max-width: 540px
                }
            }

            @media (min-width:768px) {
                .container {
                    max-width: 720px
                }
            }

            @media (min-width:992px) {
                .container {
                    max-width: 960px
                }
            }

            @media (min-width:1200px) {
                .container {
                    max-width: 1140px
                }
            }

            /* Row */
            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px
            }

            /* Col-lg-3 */
            .col-lg-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                position: relative;
                width: 100%;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
                max-width: 25%
            }

            /* Col-md-3 */
            .col-md-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                position: relative;
                width: 100%;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
                max-width: 25%
            }

            /* Single-feature */
            .single-feature {
                padding: 30px 15px;
                text-align: center;
                border: 1px solid #eff2f3;
                margin-bottom: 50px
            }

            .single-feature h3 {
                font-size: 15px;
                font-weight: 500;
                text-transform: uppercase;
                margin-top: 25px
            }

            .single-feature .title i {
                color: #4a4a4a;
                font-weight: 500;
                font-size: 24px;
                display: inline-block
            }

            .single-feature p {
                margin-bottom: 0px;
                margin-top: 10px
            }

            /* Title */
            abbr[data-original-title],
            abbr[title] {
                text-decoration: underline;
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted;
                cursor: help;
                border-bottom: 0
            }

            abbr[title]::after {
                content: " (" attr(title) ")"
            }
            
            /* Section gap bottom custom */
            .section_gap_bottom_custom{
                padding-bottom:70px
            }
            
            @media (max-width: 991px){
                .section_gap_bottom_custom{
                    padding-bottom:30px
                }
            }
        </style> 
    <!--===============================================================================================-->
</head>

<body>
    
    <!-- Start your project here-->
    
        <!-- Pay_Type -->
        <section class="probootstrap-section probootstrap-bg-white" style="margin-top: -5rem">

            <!-- Zone caractéristique -->
            <section class="feature-area section_gap_bottom_custom">
                <div class="container" style="margin-left: 35rem;">
                    <div class="row">

                        <!-- MOOV_Money -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-feature" style="border: 1px solid; border-radius: 15px">
                                <a href="#" class="title" onClick="alert('Merci, pour le paiement voici le numéro : +225 41 02 81 27');">
                                    <img src="img/moovmoney.jpg" alt="" style="width: 200px; height: 200px; border-radius: 15px; border: 1px solid">
                                </a>
                                <p>MOOV MONEY</p>
                            </div>
                        </div>

                        <!-- MTN_Money -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-feature" style="border: 1px solid; border-radius: 15px">
                                <a href="#" class="title" onClick="alert('Merci, pour le paiement voici le numéro : +225 84 20 78 17');">
                                    <img src="img/mntmoney.jpg" alt="" style="width: 200px; height: 200px; border-radius: 15px; border: 1px solid">
                                </a>
                                <p>MTN MONEY</p>
                            </div>
                        </div>

                        <!-- ORANGE_Money -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-feature" style="border: 1px solid; border-radius: 15px">
                                <a href="#" class="title" onClick="alert('Merci, pour le paiement voici le numéro : +225 89 57 36 12');">
                                    <img src="img/orangemoney.jpg" alt="" style="width: 200px; height: 200px; border-radius: 15px; border: 1px solid">
                                </a>
                                <p>ORANGE MONEY</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Bottom_bye -->
            <div class="row">
                <div class="form-group" style="margin-left: 15rem;">
                    <a href="pay_replay.php">
                        <input type="submit" id="submitform" name="submitform" value="Au revoir à bientôt" class="btn btn-lg btn-primary btn-block" style="width: 80%!important; margin-left: 40rem">
                    </a>
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

</body>

</html>