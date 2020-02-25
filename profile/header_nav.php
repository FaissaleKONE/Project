<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HVent|food</title>
    <!--===============================================================================================-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--===============================================================================================-->
        <link rel="stylesheet" href="css/styles-merged.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" href="css/style.min.css">
    <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="favicon.ico">
    <!--===============================================================================================-->
    
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/slick-theme.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/bootsnav.css">

    <!--===============================================================================================-->
    <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
    <!--===============================================================================================-->
    <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/colors/maron.css">
    <!--===============================================================================================-->
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <!--===============================================================================================-->    
</head>

<body data-spy="scroll" data-target=".navbar-collapse">

    <!-- Start your project here-->

        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div>

        <!-- navbar -->
        <nav class="navbar navbar-default navbar-fixed white no-background bootsnav probootstrap-navbar">
            
            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Rechercher ..." name="search" id="search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>

            <div class="container">

                <!-- Start Attribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu" style="margin-left: -3.5em">                      
                    <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="active"><a href="#" data-nav-section="welcome">Accueil</a></li>
                        <li><a href="#" data-nav-section="specialties">Spécialités</a></li>
                        <li><a href="#" data-nav-section="menu">Menu</a></li>
                        <li><a href="#" data-nav-section="reservation">Réservation</a></li>
                        <li><a href="#" data-nav-section="events">Evénements</a></li>
                        <li><a href="#" data-nav-section="contact">Contact</a></li>
                    </ul>
                </div>

                <div style="margin-top: -8.2rem; width: 250px; margin-left: 52em">    
                    <ul class="nav" data-in="fadeInDown" data-out="fadeOutUp"> 
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle text-center" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"  id="navbarDropdownMenuLink-4">
                                <?php if(!empty($_SESSION["admin_email"])){echo $_SESSION['admin_email'];}?>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" style="background: white;">
                                <a class="dropdown-item" href="#"><i class="fas fa-2x fa-tasks"></i> Paramètre</a> <br>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-2x fa-lock"></i> Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <div class="widget">
                    <h6 class="title">Pages personnalisées</h6>
                    <ul class="link">
                        <li><a href="#welcome">Accueil</a></li>
                        <li><a href="#specialties">Spécialités</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#reservation">Réservation</a></li>
                        <li><a href="#events">Evénements</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="widget">
                    <h6 class="title">Liens supplémentaires</h6>
                    <ul class="link">
                        <li><a href="#">Faissale KONE</a></li>
                        <li><a href="#">Yohann DAKO</a></li>
                        <li><a href="#">Oriest DJELLOH</a></li>
                    </ul>
                </div>
            </div>

        </nav>

        <!-- Welcome_The_Restaurant -->
        <section class="flexslider" data-section="welcome">
            <ul class="slides">
                <li style="background-image: url(img/hero_bg_1.jpg)" class="overlay" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                    <h1 class="primary-heading">Accueil</h1><br>
                                    <h3 class="secondary-heading">Le Restaurant</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li style="background-image: url(img/hero_bg_2.jpg)" class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                    <h1 class="primary-heading">Diner</h1><br>
                                    <h3 class="secondary-heading">Avec Nous</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li style="background-image: url(img/hero_bg_3.jpg)" class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                    <h1 class="primary-heading">Profiter</h1><br>
                                    <h3 class="secondary-heading">Avec Nous</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    
    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!--===============================================================================================-->
        <!-- JS includes -->
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/jquery.collapse.js"></script>
        <script src="assets/js/bootsnav.js"></script>
    <!--===============================================================================================-->
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>       
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