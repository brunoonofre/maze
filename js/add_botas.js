$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#addbotabtn");
    
    errordiv.hide();
    successdiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){
        
        if($('input[name=nome]').val() == '' ||$('input[name=n_colaborador]').val() == '' ||$('input[name=ccustos]').val() == '' ||$('select[name=departamento]').val() == '' ||$('select[name=tamanho]').val() == ''||$('select[name=tipo]').val() == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var id_utilizador = $('input[name=id_utilizador]').val();
            var nome = $('input[name=nome]').val();
            var n_colaborador = $('input[name=n_colaborador]').val();
            var ccustos = $('input[name=ccustos]').val();
            var departamento = $('select[name=departamento]').val();
            var tamanho = $('select[name=tamanho]').val();
            var tipo = $('select[name=tipo]').val();
            var estado = 1;

            post_data = {
                'id_utilizador': id_utilizador,
                'nome': nome,
                'n_colaborador': n_colaborador,
                'ccustos': ccustos,
                'departamento': departamento,
                'tamanho': tamanho,
                'tipo': tipo,
                'estado': estado
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_botas.php',
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
                        location = 'bota';
                    }
                }
            });
            
        }
        
    });
    
});