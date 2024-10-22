$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#registerbtn");
    
    errordiv.hide();
    successdiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){

        if($('input[name=nome]').val() == '' ||$('input[name=n_colaborador]').val() == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var nome = $('input[name=nome]').val();
            var n_colaborador = $('input[name=n_colaborador]').val();
            
            post_data = {
                'nome': nome,
                'n_colaborador': n_colaborador
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/registar.php',
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
                        location = '../maze';
                    }
                }
            });
            
        }
        
    });
    
});