$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#adduserbtn");
    
    errordiv.hide();
    successdiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){
        
        if($('input[name=nome]').val() == '' ||$('input[name=utilizador]').val() == '' ||$('select[name=estatuto]').val() == ""){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var nome = $('input[name=nome]').val();
            var utilizador = $('input[name=utilizador]').val();
            var estatuto = $('select[name=estatuto]').val();
            
            post_data = {
                'nome': nome,
                'utilizador': utilizador,
                'estatuto': estatuto
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_user.php',
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
                        location = 'guser';
                    }
                }
            });
            
        }
        
    });
    
});