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
            var iofinal = $('select[name=io]').val();
            alert(iofinal);
        }else if(tipo=='moe'){
            var iolinha = $('select[name=linha]').val();
            var ioequip = $('select[name=equip_io]').val();
            if(ioequip=="" || ioequip==null){
                if(iolinha.indexOf("equip")>=0){
                    var iofinal = "";
                }else{
                    var iofinal = iolinha;
                }
            }else{
                var iofinal = ioequip;
            }
            alert(iofinal);
        }
        
        return false;
        
        if($('input[name=nome]').val() == '' ||$('select[name=departamento]').val() == '' ||$('input[name=io_consumo]').val() == '' ||$('input[name=io_moe]').val() == '' ||$('input[name=io_mfe]').val() == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var nome = $('input[name=nome]').val();
            var departamento = $('select[name=departamento]').val();
            var io_consumo = $('input[name=io_consumo]').val();
            var io_moe = $('input[name=io_moe]').val();
            var io_mfe = $('input[name=io_mfe]').val();
            var equipamentos = $('input[name=equipamentos]:checked').val();

            if(equipamentos!=1){
                equipamentos = 0;
            }
            
            post_data = {
                'nome': nome,
                'departamento': departamento,
                'io_consumo': io_consumo,
                'io_moe': io_moe,
                'io_mfe': io_mfe,
                'equipamentos': equipamentos
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_linha.php',
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
                        location = 'linha';
                    }
                }
            });
            
        }
        
    });
    
});