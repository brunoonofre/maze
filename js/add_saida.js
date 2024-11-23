$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#saidabtn");
    
    errordiv.hide();
    successdiv.hide();

    $("input[name=tipo]").on('change',function(){
        var tipo = $('input[name=tipo]:checked').val();
        $("#ioselect").load("query_ioselect.php", {'tipo': tipo});
    });
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){
        
        var tipo = $('input[name=tipo]:checked').val();

        if(tipo=='mfe' || tipo=='cns' || tipo=='dpt'){
            iofinal = $('select[name=io]').val();
        }else if(tipo=='moe'){
            var iolinha = $('select[name=linha]').val();
            var ioequip = $('select[name=equip_io]').val();
            if(ioequip=="" || ioequip==null){
                if(iolinha.indexOf("equip")>=0){
                    iofinal = "";
                }else{
                    iofinal = iolinha;
                }
            }else{
                iofinal = ioequip;
            }
            
        }else if(tipo==null){
            iofinal = "";
        }
        
        if($('input[name=uilizador]').val() == '' ||$('input[name=pn]').val() == '' ||$('input[name=qty]').val() == '' ||iofinal == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var utilizador = $('input[name=utilizador]').val();
            var pn = $('input[name=pn]').val();
            var qty = $('input[name=qty]').val();
            
            post_data = {
                'utilizador': utilizador,
                'pn': pn,
                'qty': qty,
                'io': iofinal
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_saida.php',
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
                        location = 'saidas';
                    }
                }
            });
            
        }
        
    });
    
});