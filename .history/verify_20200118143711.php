<?php 
  session_start();
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>KYF|SERGE</title>
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
  <!-- Bootstrap core CSS -->
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Material Design Bootstrap -->
  <!-- <link href="css/mdb.min.css" rel="stylesheet"> -->
  <!-- Your custom styles (optional) -->
  <!-- <link href="css/style.css" rel="stylesheet"> -->

      <!--===============================================================================================-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/styles-merged.css">
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" href="css/style.min.css"> -->
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="favicon.ico">
    <!--===============================================================================================-->
</head>

<body>

  <div id="mdb-preloader" class="flex-center">
    <div id="preloader-markup"></div>
  </div>

  <!-- Start your project here-->
    <div class="container">
      <div class="card">
        <div class="card-header"> 
          <h1 class="text-center">Formulaire</h1>
        </div>

        <div class="card-body">
          <form action="" method="POST" id="form">
            <div id="message"></div>

            <div class="col-6 m-auto">
              <div class="form-group ">
                <label for="ename">Nom </label><br>
                  <input type="text" placeholder="Nom" name="ename" id="ename" class="form-control">
                  <div id="error_ename" class="text-danger"></div>
              </div>
            </div>
          
            <div class="col-6 m-auto">
              <div class="form-group ">
                <label for="lastname">Prenom</label> <br>
                <input type="text" placeholder="Prenom" name="lastname" id="lastname" class="form-control">
                <div id="error_lastname" class="text-danger"></div>
              </div>
            </div> 

            <div class="col-6 m-auto">
              <div class="form-group ">
                <label for="mail">Email</label> <br>
                <input type="text" placeholder="email" name="mail" id="mail" class="form-control">
                <div id="error_mail" class="text-danger"></div>
              </div>
            </div>

            <div class="col-6 m-auto">
              <div class="form-group m-auto text-center" >
                <input type="submit" value="envoyer" class="btn btn-warning " name="submit_button" id="submit_button" style="width: 70%!important">
              </div>
            </div>
          
          </form>
        </div>
      </div>
    </div>
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>

  <script>
    $(document).ready(function(){

      function restForm(){
        $('#form')[0].reset();
        $('#form #error_mail').text('');
        $('#form #error_ename').text('');
        $('#form #error_lastname').text('');
      }

      $('#form').on('submit',function(event){
        event.preventDefault()
        
        $.ajax({
          url: "fetch.php",
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          
          beforeSend: function(){
            $("#submit_button").attr("disabled","disabled")
            $("#submit_button").val('Envoi en cours...')
          },

          success:function(data){
            
            if (data.success){
              $("#submit_button").attr("disabled",false);
              $("#submit_button").val("envoyer");
              restForm();
              $("#message").html('<div class="alert alert-success">'+data.success+'</div>')          
            }

            if (data.error){
              $("#submit_button").attr("disabled",false);
              $("#submit_button").val("envoyer");
              
              if (data.error_ename != ''){
                $("#error_ename").text(data.error_ename)
              }else{
                $("#error_ename").text('')
              }

              if (data.error_lastname != ''){
                $("#error_lastname").text(data.error_lastname)
              }else{
                $("#error_lastname").text('')
              }

              if (data.error_lastname != ''){
                $("#error_lastname").text(data.error_lastname)
              }else{
                $("#error_lastname").text('')
              }

              if (data.error_mail != ''){
                $("#error_mail").text(data.error_mail)
              }else{
                $("#error_mail").text('')
              }

            }
          }
        })
      })
    })
    
    </script>
  
</body>

</html>