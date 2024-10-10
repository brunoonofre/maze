$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#addpedidobtn");
    
    errordiv.hide();
    successdiv.hide();

    $("select#linha").on('change',function(){
        var id_linha = $('select[name=linha]').val();
        $("#matchecks").load("query_material_linha.php", {'id_linha': id_linha});
    });


    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
    });
    
    button.click(function(){
        
        var lista = {};
        var qtyval = 0;
        var matcount = 0;
        successdiv.slideUp();
        errordiv.slideUp();
        $(':checkbox:checked').each(function(i){
            var id = $(this).val()
            var quantidade = $("#"+id).val();
            if(quantidade=="" || quantidade == null){
                successdiv.slideUp();
                errordiv.slideDown();
                error.html("Deve preencher as quantidades nos produtos selecionados!");
                qtyval = 1;
            }else{
                matcount ++;
                lista[i] = {id,
                    qty: quantidade};
            }
        });
        
        
        if(matcount == 0 || qtyval == 1 || $('select[name=linha]').val() == ''){ //fazer verificação quantidades
            error.html("Encontram-se campos necessarios por preencher!");
            return false;
        }else if($('textarea[name=nota]').val()==''){
            if(!confirm('Não deixou nenhuma nota. Pretende enviar mesmo assim?')){
                return false;
            }
        }else{
            
            var id_linha = $('select[name=linha]').val();
            var id_utilizador = $('input[name=id_utilizador]').val();
            var nota = $('textarea[name=nota]').val();
            var listaf = JSON.stringify(lista);

            post_data = {
                'id_linha': id_linha,
                'id_utilizador': id_utilizador,
                'lista': listaf
            };

            $.ajax({
                type: 'post',
                url: 'includes/add_pedido.php',
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
                        if(nota!=''){

                            var id_pedido = response.text; 

                            post_nota = {
                                'id_pedido': id_pedido,
                                'id_utilizador': id_utilizador,
                                'nota': nota
                            };
            
                            $.ajax({
                                type: 'post',
                                url: 'includes/add_nota.php',
                                data: post_nota,
                                dataType: 'json',
                                success: function(response){
                                    location = 'pedido';
                                }
                            });
                        }else{
                            location = 'pedido';
                        }
                    }
                }
            });
            
        }
        
    });
    
});