$(function(){

    var errormodal = $("#errormodal");
    var errormod = $("#errormod");
    var button = $("#outputbtn");

    errormodal.hide();

    button.click(function(){

        var id = $("input[name=id_saida_pedido]").val();

        post_data = {
            'id': id
        };

        $.ajax({
            type: 'post',
            url: 'includes/registar_saidapedido.php',
            data: post_data,
            dataType: 'json',
            error: function(xhr, ajaxOptions, thrownError){
                errormodal.slideDown();
                errormod.html("Error:\n" + thrownError);
            },
            success: function(response){
                if(response.success == false){
                    errormodal.slideDown();
                    errormod.html(response.text);
                }else{
                    errormodal.slideUp();
                    location = 'baixapedidos';
                }
            }
        });
        
    });

});