/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

init = function(){
    $("#add-brand-btn").on('click', function(){
        $name = $("input[name='name']").val();

        $.ajax({
            url: '/admin/brand/add',
            type: 'POST',
            data: {name: $name, csrf_token: ""},
            success: function(){
                $("#add-brand-modal").modal( 'hide');
                loadTable();
            },
            error: function(){

            }
        });

    });

    $("#delete-brand-btn").on('click', function(){
        $.ajax({
            url: '/admin/brand/delete',
            type: 'POST',
            data: {id: $(this).data('id'), csrf_token: ""},
            success: function(response){
                $("#delete-brand-modal").modal( 'hide');
                $data = $.parseJSON(response);
                if (!$data.success) {
                    $(".alert-error").append($data.msg);
                    $(".alert-error").show();
                }
                loadTable();
            },
            error: function(response){
                $data = $.parseJSON(response);
                $("#delete-brand-modal").modal( 'hide');
                $(".alert-error").append($data.msg);
            }
        });
    });
}

loadTable = function() {
    $.ajax({
            url: '/admin/brand/load',
            type: 'GET',
            async: false,
            success: function(response){
                $("tbody").html(response)
            },
            error: function(){
                $(".alert-error").append("There is an error occured.");
            }
        });

    $(".delete-brand-btn").on('click', function(){
        $("#delete-brand-btn").attr('data-id', $(this).data('id'));
    })

}

$( document ).ready(function() {
  $(".alert-error").hide();
  init();
  loadTable();
});

