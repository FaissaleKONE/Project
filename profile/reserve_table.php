<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HVent|food</title>
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

        <!-- Form_To_Reserve_A_Table -->
        <section class="probootstrap-section probootstrap-bg-white">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12 probootstrap-animate">

                        <form method="POST" action="" class="probootstrap-form" id="register_form">
                            <div id="message_register"></div>

                            <!-- First_Row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="people">Combien de personnes</label> <br>
                                        <div class="form-field">
                                            <i class="icon icon-chevron-down"></i>
                                            <select name="people" id="people" class="form-control">
                                                <option value="">Personne</option>
                                                <option value="1">1 Personne</option>
                                                <option value="2">2 Personnes</option>
                                                <option value="3">3 Personnes</option>
                                                <option value="4">4 Personnes</option>
                                                <option value="5">5 Personnes</option>
                                                <option value="10">6+ Personnes</option>
                                            </select>
                                            <div id="error_people" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date">Date</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-calendar"></i>
                                            <input type="text" id="date" name="date" class="form-control">
                                            <div id="error_date" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="time">Temps</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-clock"></i>
                                            <input type="text" id="time" name="time" class="form-control">
                                            <div id="error_time" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Second_Row -->
                            <div class="row">
                                <!-- Last_Name_Client -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_name">Prénom</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-user2"></i>
                                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Prénom">
                                            <div id="error_last_name" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- First_Name_Client -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">Nom</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-user2"></i>
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Nom">
                                            <div id="error_first_name" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sexe_Client -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="genre">Sexe</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-chevron-down"></i>
                                            <select class="form-control" id="genre" name="genre">
                                                <option value="">Sexe</option>
                                                <option value="M">Masculin</option>
                                                <option value="F">Feminin</option>
                                            </select>
                                            <div id="error_genre" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Third_Row -->
                            <div class="row">
                                <!-- Email_client -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-mail"></i>
                                            <input type="text" id="email" name="email" class="form-control" placeholder="Email address">
                                            <div id="error_email" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone_client1 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone1</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-phone"></i>
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                                            <div id="error_phone" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone_client2 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone2">Phone2</label><br>
                                        <div class="form-field">
                                            <i class="icon icon-phone"></i>
                                            <input type="text" id="phone2" name="phone2" class="form-control" placeholder="Phone">
                                            <div id="error_phone2" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <input type="submit" value="Envoyer" name="c_submit" id="c_submit" class="btn btn-lg btn-primary btn-block" style="width: 70%!important; margin-left: 5rem ">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <br>

            <!-- Zone caractéristique -->
            <section class="feature-area section_gap_bottom_custom">
                <div class="container" style="margin-left: 35rem;">
                    <div class="row" style="margin-left: 17.5em; width: 100%!important">

                        <div class="col-lg-3 col-md-6">
                            <div class="single-feature" style="border: 1px solid; border-radius: 15px">
                                <a href="commande.php" class="title">
                                    <i class="fa fa-truck" style="font-size: 48px; color: black"></i>
                                    <h3>Commande / Livraison</h3>
                                </a>
                                <p>Doit ouvrir</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </section>

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