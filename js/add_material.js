$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#addmatbtn");
    
    errordiv.hide();
    successdiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){
        
        if($('input[name=pn]').val() == '' ||$('input[name=descricao]').val() == '' ||$('input[name=localizacao]').val() == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var pn = $('input[name=pn]').val();
            var descricao = $('input[name=descricao]').val();
            var localizacao = $('input[name=localizacao]').val();
            
            if($("input[name=setup]").is(':checked')){
                var setup = 1;
            }else{
                var setup = 0;
            }

            post_data = {
                'pn': pn,
                'descricao': descricao,
                'localizacao': localizacao,
                'setup': setup
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_material.php',
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
                        location = 'materia';
                    }
                }
            });
            
        }
        
    });
    
});