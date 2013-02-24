/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

init = function(){
    $("#add-pack-btn").on('click', function(){
        $amount = $("input[name='amount']").val();
        $uom = $("#uom_lookup").val();

        $.ajax({
            url: '/admin/pack/add',
            type: 'POST',
            data: {
                amount: $amount,
                uom: $uom,
                csrf_token: ""},
            success: function(){
                $("#add-pack-modal").modal( 'hide');
                loadTable();
            },
            error: function(){

            }
        });

    });

    $("#delete-pack-btn").on('click', function(){
        $.ajax({
            url: '/admin/pack/delete',
            type: 'POST',
            data: {id: $(this).data('id'), csrf_token: ""},
            success: function(response){
                $("#delete-pack-modal").modal( 'hide');
                $data = $.parseJSON(response);
                if (!$data.success) {
                    $(".alert-error").append($data.msg);
                    $(".alert-error").show();
                }
                loadTable();
            },
            error: function(response){
                $data = $.parseJSON(response);
                $("#delete-pack-modal").modal( 'hide');
                $(".alert-error").append($data.msg);
            }
        });
    });
}

loadTable = function() {
    $.ajax({
            url: '/admin/pack/load',
            type: 'GET',
            async: false,
            success: function(response){
                $("tbody").html(response)
            },
            error: function(){
                $(".alert-error").append("There is an error occured.");
            }
        });

    $(".delete-pack-btn").on('click', function(){
        $("#delete-pack-btn").attr('data-id', $(this).data('id'));
    })

}

$( document ).ready(function() {
  $(".alert-error").hide();
  init();
  loadTable();
});

