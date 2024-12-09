$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#addlinhabtn");
    
    errordiv.hide();
    successdiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });

    $("input[name=equipamentos]").on('change',function(){
        if($("input[name=equipamentos]").is(':checked')){
            $("input[name=io_moe]").parent().slideUp();
            $("input[name=io_mfe]").parent().slideUp();
        }else{
            $("input[name=io_moe]").parent().slideDown();
            $("input[name=io_mfe]").parent().slideDown();
            $("input[name=io_moe]").val('');
            $("input[name=io_mfe]").val('');
        }
    })
    
    button.click(function(){
        
        if($('input[name=nome]').val() == '' ||$('select[name=departamento]').val() == '' ||$('input[name=io_consumo]').val() == '' || $('input[name=vs]:checked').val() == null){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var nome = $('input[name=nome]').val();
            var departamento = $('select[name=departamento]').val();
            var io_consumo = $('input[name=io_consumo]').val();
            var vs = $('input[name=vs]:checked').val();

            if($("input[name=equipamentos]").is(':checked')){
                equipamentos = 1;
                var io_moe = null;
                var io_mfe = null;
            }else{
                equipamentos = 0;
                var io_moe = $('input[name=io_moe]').val();
                var io_mfe = $('input[name=io_mfe]').val();
            }
            
            post_data = {
                'nome': nome,
                'departamento': departamento,
                'io_consumo': io_consumo,
                'io_moe': io_moe,
                'io_mfe': io_mfe,
                'equipamentos': equipamentos,
                'vs': vs
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