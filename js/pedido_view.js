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

        var lista = {};
        var diff = 0;
        successdiv.slideUp();
        errordiv.slideUp();
        
        $(':checkbox').each(function(i){
            var id = $(this).val();
            if($(this).is(':checked')){
                var id = $(this).val();
                var quantidade = $("#"+id).val();                
                if(quantidade=="" || quantidade==null || quantidade==0){
                    successdiv.slideUp();
                    errordiv.slideDown();
                    error.html("Deve preencher as quantidades nos produtos selecionados!");
                    return false;
                }else{
                    lista[i] = {id,
                        qty: quantidade};
                    if(quantidade!=$("input[name=qty"+id+"]").val()){
                        diff++;
                    }
                }
            }else{
                var id = $(this).val();
                var quantidade = 0;
                lista[i] = {id,
                    qty: quantidade};
                diff++;
            }
            


        });
        
        if(!confirm("Pretende atender este pedido?")){
            return false;
        }
        
        var id_pedido = $('input[name=id_pedido]').val();
        var io = $('input[name=io]').val();
        var listaf = JSON.stringify(lista);

        post_lista = {
            'id_pedido': id_pedido,
            'io': io,
            'lista': listaf
        }

        $.ajax({
            type: 'post',
            url: 'includes/add_saida_pedido.php',
            data: post_lista,
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

                    if(diff==0){
                        estado = 3;
                    }else{
                        estado = 2;
                    }

                    post_estado = {
                        'id_pedido': id_pedido,
                        'estado': estado
                    };

                    $.ajax({
                        type: 'post',
                        url: 'includes/edit_estado.php',
                        data: post_estado,
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
                                if(diff==0){
                                    location = 'pedido';
                                }else{
                                    $('#enviarnota').modal('toggle');
                                }
                            }
                        }
                    });
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
        
        var id_pedido = $('input[name=id_pedido]').val();
        var id_utilizador = $('input[name=id_utilizador]').val();
        var nota = $('textarea[name=nota]').val();

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
                }else{
                    errordiv.slideUp();
                    successdiv.slideDown();
                    success.html("Nota enviada com sucesso!");
                    $('#enviarnota').modal('toggle');
                    location = 'pedido';
                    
                }
            }
        });
        
    });

});