$(function(){

    var errordiv = $("#errordiv");
    var error = $("#error");
    var errormodal = $("#errormodal");
    var errormod = $("#errormod");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#outputbtn");
    
    errordiv.hide();
    errormodal.hide();
    successdiv.hide();
    
    
    $("span.delete").click(function(){

        if(!confirm("Tem a certeza que pretende eliminar este registo?")){
            return false;
        }

        var id = this.id;

        post_data = {
            'id': id
        };

        $.ajax({
            type: 'post',
            url: 'includes/del_saida.php',
            data: post_data,
            dataType: 'json',
            error: function(xhr, ajaxOptions, thrownError){
                alert("Error:\n" + thrownError);
            },
            success: function(response){
                if(response.success == false){
                    errormodal.slideDown();
                    errormod.html("Ocorreu um erro inesperado!")
                }else{
                    $("#"+id).parent().slideUp();
                }
            }
        });

    });

    button.click(function(){

        errormodal.slideUp();
        var count = $("input[name=io]:checked").length;
        tm = 0;

        if(count==0){
            errormodal.slideDown();
            errormod.html('Não confirmas-te nenhum registo!');
        }

        $("input[name=io]:checked").each(function(){
            
            var count = $("input[name=io]:checked").length;
            var io = $(this).val();

            post_data = {
                'io': io
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/registar_saida.php',
                data: post_data,
                dataType: 'json',
                error: function(xhr, ajaxOptions, thrownError){
                    alert("Error:\n" + thrownError);
                },
                success: function(response){
                    if(response.success == false){
                        errormodal.slideDown();
                        errormod.html("Ocorreu um erro inesperado!");
                    }else if(response.success == true){
                        tm++;
                        if(tm==count){
                            location = 'saida';
                        }
                    }
                }
            });
            
            
        });

    });

});