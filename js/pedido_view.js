$(function(){

    var button = $("#atbtn");
    var notabtn = $("#notabtn");
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");

    errordiv.hide();
    successdiv.hide();

    button.click(function(){
        
        if(!confirm("Pretende atender este pedido?")){
            return false;
        }else if(!confirm("Tem a certeza?")){
            return false;
        }
        
        var id_pedido = $('input[name=id_pedido]').val();
        
        post_data = {
            'id_pedido': id_pedido,
            'estado': 3
        };
        
        $.ajax({
            type: 'post',
            url: 'includes/edit_estado.php',
            data: post_data,
            dataType: 'json',
            error: function(xhr, ajaxOptions, thrownError){
                alert("Error:\n" + thrownError);
            },
            success: function(response){
                if(response.success == false){
                    successdiv.slideUp();
                    errordiv.slideDown();
                    error.html(response.text);
                }else{
                    errordiv.slideUp();
                    location = 'pedido';
                }
            }
        });
        
    });

    notabtn.click(function(){
        
        if($('textarea[name=nota]').val()==''){
            alert("Deve escrever uma nota!")
            return false;
        }else if(!confirm("Pretende enviar esta nota?")){
            return false;
        }
        
        var succ = 0;
        var id_pedido = $('input[name=id_pedido]').val();
        var id_utilizador = $('input[name=id_utilizador]').val();
        var nota = $('textarea[name=nota]').val();
        var atp = $('input[name=atp]').val();
        
        post_data = {
            'id_pedido': id_pedido,
            'id_utilizador': id_utilizador,
            'nota': nota
        };

        $.ajax({
            type: 'post',
            url: 'includes/add_nota.php',
            data: post_data,
            dataType: 'json',
            error: function(xhr, ajaxOptions, thrownError){
                alert("Error:\n" + thrownError);
            },
            success: function(response){
                if(response.success == false){
                    successdiv.slideUp();
                    errordiv.slideDown();
                    error.html(response.text);
                    succ = 0;
                }else{
                    errordiv.slideUp();

                    if(atp==1){

                        post_data2 = {
                            'id_pedido': id_pedido,
                            'estado': 2
                        }
                        
                        $.ajax({
                            type: 'post',
                            url: 'includes/edit_estado.php',
                            data: post_data2,
                            dataType: 'json',
                            error: function(xhr, ajaxOptions, thrownError){
                                alert("Error:\n" + thrownError);
                            },
                            success: function(response){
                                if(response.success == false){
                                    successdiv.slideUp();
                                    errordiv.slideDown();
                                    error.html(response.text);
                                }else{
                                    errordiv.slideUp();
                                    successdiv.slideDown();
                                    success.html("Pedido atendido com sucesso!")
                                    $('#enviarnota').modal('toggle');
                                }
                            }
                        });

                    }else{
                        successdiv.slideDown();
                        success.html("Nota enviada com sucesso!");
                        $('#enviarnota').modal('toggle');
                        location = 'pedido';
                    }
                }
            }
        });
        
    });

});