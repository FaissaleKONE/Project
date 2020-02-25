<?php

$('.action').change(function() {

    if ($(this).val() != '') {
        var action = $(this).attr("id");
        var query = $(this).val();
        var result = '';
        if (action == "institut") {
            result = 'niveau';
        } else {
            result = 'classe';
            var institut = $("#institut option:selected").text();
        }
        $.ajax({
            url: "./ajax_actions/fetch_options.php",
            method: "POST",
            data: {
                action: action,
                query: query,
                institut: institut
            },
            beforeSend: function() {

                if (action == "institut") {
                    $('#niveau').attr('disabled', 'disabled')
                }
                if (action == "niveau") {
                    $('#classe').attr('disabled', 'disabled')
                }
            },

            success: function(data) {
                if (action == "institut") {
                    $('#niveau').attr('disabled', false)

                }
                if (action == "niveau") {
                    $('#classe').attr('disabled', false)
                }
                $('#' + result).html(data);
            }

        })
    }
});


?>