$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#addbatabtn");
    
    errordiv.hide();
    successdiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){
        
        if($('input[name=nome]').val() == '' ||$('input[name=n_colaborador]').val() == '' ||$('input[name=ccustos]').val() == '' ||$('input[name=departamento]').val() == '' ||$('select[name=tamanho]').val() == ''||$('select[name=cor]').val() == '' ||$('input[name=quantidade]').val() == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var id_utilizador = $('input[name=id_utilizador]').val();
            var nome = $('input[name=nome]').val();
            var n_colaborador = $('input[name=n_colaborador]').val();
            var ccustos = $('input[name=ccustos]').val();
            var departamento = $('input[name=departamento]').val();
            var tamanho = $('select[name=tamanho]').val();
            var cor = $('select[name=cor]').val();
            var quantidade = $('input[name=quantidade]').val();
            var estado = 1;

            post_data = {
                'id_utilizador': id_utilizador,
                'nome': nome,
                'n_colaborador': n_colaborador,
                'ccustos': ccustos,
                'departamento': departamento,
                'tamanho': tamanho,
                'cor': cor,
                'quantidade': quantidade,
                'estado': estado
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_batas.php',
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
                        location = 'bata';
                    }
                }
            });
            
        }
        
    });
    
});