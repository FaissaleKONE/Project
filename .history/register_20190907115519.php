<?php
    require_once("database_connexion.php");
    session_start();
    
    if(!isset($_SESSION["admin_id"])){
        header('Location: login.php');
    }
    
    include "partials/header_form.php";
  

    include "partials/nav.php";
    

//index.php   
    $institut = '';
    $query = "
    SELECT institut FROM inst_fil_class GROUP BY institut ORDER BY institut ASC
    ";
    $result = $connect->query($query);
    $result->execute();
    while($row = $result->fetch())
    {
      $institut .= '<option value="'.$row["institut"].'">'.$row["institut"].'</option>';
    }
?>
<style type="text/css">
    .waves-input-wrapper{
        width: 100%!important;
    }
</style>
<div class="container-fluid">  

            <div class="row">
    
                <div class="container m-auto" style="margin-top : 20px!important">
                    <div class="card wow rubberBand">
                        <div class="card-header"><h3 class="text-center">Formulaire d'Enrôlement</h3></div>
                        <div class="card-body">
                            <div id="message"></div>
                            <form method="POST" action="" id="student_register_form">
                                <?php //echo $_SESSION['ligne']?>
                                <!-- Infos Etudiant-->
                                <div id="message_operation"></div>
                                <div class="row">
                                    
                                    <!-- nom etudiant -->
                                    <div class="col-lg-6 col-12">
                                      <div class="form-group mb-3">
                                        
                                        <input type="text" class="form-control" placeholder="Nom" aria-label="Nom" aria-describedby="basic-addon1" id="student_last_name" name="student_last_name">
                                        <span class="text-danger" id="error_student_last_name"></span>
                                      </div>
                                    </div>

                                    <!-- prenom etudiant -->
                                    <div class="col-lg-6 col-12">
                                      <div class="form-group mb-3">
                                          
                                        <input type="text" class="form-control" placeholder="Prénom" aria-label="Prénom" aria-describedby="basic-addon2" id="student_first_name" name="student_first_name">
                                        <span class="text-danger" id="error_student_first_name"></span>
                                      </div>
                                    </div>

                                    <!-- phone etudiant -->
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon2">+225</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Contact Etudiant" aria-label="Contact Etudiant" aria-describedby="basic-addon2" id="student_phone" name="student_phone">
                                            </div>
                                            <span class="text-danger" id="error_student_phone"></span>
                                        </div>
                                    </div>

                                    <!-- sexe etudiant -->
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mb-3">
                                            <select class="browser-default custom-select" id="student_sexe" name="student_sexe">
                                              <option value="">Sexe</option>
                                              <option value="M">Masculin</option>
                                              <option value="F">Feminin</option>
                                            </select>
                                            <span class="text-danger" id="error_student_sexe"></span>
                                        </div>
                                    </div>

                                    <!-- naissance etudiant -->
                                    <!-- <div class="col-lg-6 col-12">
                                        <div class="form-group mb-3">
                                            <div class="input-group date">
                                                <input type="text" class="form-control datepicker" data-provide="datepicker" id="student_birthday" name="student_birthday" readonly placeholder="Date de naissance"><span class="input-group-addon"><i class="fas fa-table"></i></span>
                                            </div>
                                            <span class="text-danger" id="error_student_birthday"></span>
                                        </div>
                                    </div> -->

                                    <!-- habitation etudiant -->
                                    <div class="col-lg-6 col-12">
                                      <div class="form-group mb-3">
                                        <input type="text" class="form-control" placeholder="Lieu d'Habitation" aria-label="Lieu d'Habitation" aria-describedby="basic-addon2" id="student_situation" name="student_situation">
                                        <span class="text-danger" id="error_student_situation"></span>
                                      </div>
                                    </div>

                                    <!-- filiere etudiant -->
                                    <div class="col-lg-6 col-12">
                                      <select class="browser-default custom-select mb-3 action" name="institut" id="institut">
                                        <option value="">Selectionner l'Institut</option>
                                          <?php echo $institut; ?>
                                      </select>
                                    </div>

                                    <!-- niveau etudiant -->
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mb-3">
                                            <select class="browser-default custom-select action" name="niveau" id="niveau">
                                                <option value="">Selectionner le Niveau</option>
                                            </select>
                                            
                                        </div>
                                    </div>

                                    <!-- classe etudiant -->
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mb-3">
                                            <select class="browser-default custom-select" name="classe" id="classe">
                                                <option value="">Selectionner la Classe</option>
                                            </select>
                                            <span class="text-danger" id="error_classe"></span>
                                        </div>
                                    </div>
                                    
                                    <!-- phone1 parent etudiant -->
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">+225</span>
                                              </div>
                                              <input type="text" class="form-control" placeholder="Contact parent N°1" aria-label="Contact parent N°1" aria-describedby="basic-addon23" id="parent_phone1" name="parent_phone1">
                                            </div>
                                            <span class="text-danger" id="error_parent_phone1"></span>
                                        </div>
                                    </div>

                                    <!-- phone2 parent etudiant -->
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">+225</span>
                                              </div>
                                              <input type="text" class="form-control" placeholder="Contact parent N°2" aria-label="Contact parent N°2" aria-describedby="basic-addon21" id="parent_phone2" name="parent_phone2">
                                            </div>
                                            <span class="text-danger" id="error_parent_phone2"></span>
                                        </div>
                                    </div>

                                    <!-- email parent etudiant -->
                                    <div class="col-lg-6 col-12">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon4">@</span>
                                          </div>
                                          <input type="email" class="form-control" placeholder="Email parent" aria-label="Email parent" aria-describedby="basic-addon4" id="parent_email" name="parent_email">
                                        </div>
                                        <!-- <span class="text-danger" id="error_student_email_parent"></span> -->
                                    </div>
                                    <div class="col-lg-6 col-12"></div>
                      
                                    <!-- bouton envoi -->
                                    <div class="col-lg-7 m-auto">
                                      <div class="form-group m-auto">
                                          <input type="submit" class="btn text-white m-auto p-2" style="width: 100%!important; background-color: #ff6e00 !important" value="Enregistrer" id="submit_form" name="submit_form" />
                                      </div>                      
                                    </div>
                                      
                                  </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
          
            </div>
                
        </div>


    <script>
        $(document).ready(function(){

         $('.action').change(function(){
                 
            if($(this).val() != '')
            {
              var action = $(this).attr("id");
              var query = $(this).val();
              var result = '';
              if(action == "institut")
              {
                result = 'niveau';
              }
              else
              {
                result = 'classe';
                var institut = $("#institut option:selected").text();
              }
              $.ajax({
                url:"./ajax_actions/fetch_options.php",
                method:"POST",
                data:{action:action, query:query, institut: institut},
                beforeSend: function(){
                    
                    if(action == "institut"){
                        $('#niveau').attr('disabled', 'disabled')
                    }
                    if(action == "niveau"){
                        $('#classe').attr('disabled', 'disabled')
                    }
                },
                
                success:function(data){
                    if(action == "institut"){
                        $('#niveau').attr('disabled', false)
                        
                    }
                    if(action == "niveau"){
                        $('#classe').attr('disabled', false)
                    }
                    $('#'+result).html(data);
                }
                  
              })
            }
          });
          
          
             $('#student_register_form').on('submit', function(event){
                 event.preventDefault()
                    $.ajax({
                      url:"./ajax_actions/fetch_options.php",
                      method:"POST",
                      data: $(this).serialize(),
                      dataType: "json",
                      beforeSend: function(){
                          $("#submit_form").attr('disabled', "disabled")
                          $("#submit_form").val('Envoi en cours...')
                      },
                      success:function(data){
                          if(data.success){
                              alert("Aucun erreur")
                              $("#message_operation").html('<div class="alert alert-success">'+data.success+'</div>');
                              $("#submit_form").attr('disabled', false);
                              $("#submit_form").val('Envoyer');
                          }
                          if(data.error){
                            //alert(data)
                            $("#submit_form").attr("disabled", false)
                            $("#submit_form").val('Envoyer')
                              
                              if(data.error_student_last_name != ''){
                                $('#error_student_last_name').text(data.error_student_last_name)
                                $('#student_last_name').removeClass('border-success');
                              }
                              else{
                                $('#error_student_last_name').text('');
                                $('#student_last_name').addClass('border-success');
                              }
                              
                              if(data.error_student_first_name != ''){
                                  $('#error_student_first_name').text(data.error_student_first_name)
                                  $('#student_first_name').removeClass('border-success');
                              }
                              else{
                                $('#error_student_first_name').text('');
                                $('#student_first_name').addClass('border-success');
                              }
                              
                              if(data.error_student_phone != ''){
                                  $('#error_student_phone').text(data.error_student_phone)
                                  $('#student_phone').removeClass("border-success")
                              }
                              else{
                                $('#error_student_phone').text('');
                                $('#student_phone').addClass("border-success");
                              }
                              
                              
                              if(data.error_student_sexe != ''){
                                  $('#error_student_sexe').text(data.error_student_sexe);
                                  $('#student_sexe').removeClass('border-success');
                              }
                              else{
                                $('#error_student_sexe').text('');
                                $('#student_sexe').addClass('border-success');
                              }
                              
                              // if(data.error_student_birthday != ''){
                              //     $('#error_student_birthday').text(data.error_student_birthday);
                              //     $('#student_birthday').removeClass('border-success');
                              // }
                              // else{
                              //   $('#error_student_birthday').text('');
                              //   $('#student_birthday').addClass('border-success');
                              // }
                              
                              if(data.error_student_situation != ''){
                                  $('#error_student_situation').text(data.error_student_situation)
                                  $('#student_situation').removeClass("border-success");
                              }
                              else{
                                $('#error_student_situation').text('');
                                $('#student_situation').addClass("border-success");
                              }
                              
                              if(data.error_classe != ''){
                                  $('#error_classe').text(data.error_classe);
                                  $('#classe').removeClass('border-success');
                              }
                              else{
                                $('#error_classe').text('');
                                $('#classe').addClass('border-success');
                              }
                              
                              if(data.error_parent_phone1 != ''){
                                  $('#error_parent_phone1').text(data.error_parent_phone1)
                                  $('#parent_phone1').removeClass("border-success");
                              }
                              else{
                                $('#error_parent_phone1').text('');
                                $('#parent_phone1').addClass("border-success");
                              }
                              
                              if(data.error_parent_phone2 != ''){
                                  $('#error_parent_phone2').text(data.error_parent_phone2)
                                  $('#parent_phone2').removeClass("border-success");
                              }
                              else{
                                $('#error_parent_phone2').text('');
                                $('#parent_phone2').addClass("border-success");
                              }
                              
                              // if(data.error_student_email_parent != ''){
                              //     $('#error_student_email_parent').text(data.error_student_email_parent)
                              //     $('#student_email_parent').removeClass("border-success");
                              // }
                              // else{
                              //   $('#error_student_email_parent').text('');
                              //   $('#student_email_parent').addClass("border-success");
                              // }
                              
                          }
                      }
                  })

             })
                  // $(".datepicker").datepicker();

                  // fonction ajax - action depuis check_admin_register
            
        
        });
    </script>




<?php include "partials/footer.php"; ?>