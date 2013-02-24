/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

init = function(){
    $("#add-product-btn").on('click', function(){
        $ing_id = $("#ingridient_lookup").val();
        $pack_id = $("#pack_lookup").val();
        $brand_id = $("#brand_lookup").val();

        $.ajax({
            url: '/admin/product/add',
            type: 'POST',
            data: {
                ingridient_id: $ing_id,
                pack_id: $pack_id,
                brand_id: $brand_id,
                csrf_token: ""},
            success: function(){
                $("#add-product-modal").modal( 'hide');
                loadTable();
            },
            error: function(){

            }
        });

    });

    $("#delete-product-btn").on('click', function(){
        $.ajax({
            url: '/admin/product/delete',
            type: 'POST',
            data: {id: $(this).data('id'), csrf_token: ""},
            success: function(response){
                $("#delete-product-modal").modal( 'hide');
                $data = $.parseJSON(response);
                if (!$data.success) {
                    $(".alert-error").append($data.msg);
                    $(".alert-error").show();
                }
                loadTable();
            },
            error: function(response){
                $data = $.parseJSON(response);
                $("#delete-product-modal").modal( 'hide');
                $(".alert-error").append($data.msg);
            }
        });
    });
}

loadTable = function() {
    $.ajax({
            url: '/admin/product/load',
            type: 'GET',
            async: false,
            success: function(response){
                $("tbody").html(response)
            },
            error: function(){
                $(".alert-error").append("There is an error occured.");
            }
        });

    $(".delete-product-btn").on('click', function(){
        $("#delete-product-btn").attr('data-id', $(this).data('id'));
    })

}

$( document ).ready(function() {
  $(".alert-error").hide();
  init();
  loadTable();
});

