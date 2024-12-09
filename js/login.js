$(function(){
    
    var errordiv = $("#errordiv");
    var error = $("#error");
    var button = $("#loginbtn");
    
    errordiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){
        
        var n_colaborador = $("input[name=n_colaborador]").val();
        var pass = $("input[name=password]").val();
        
        if(n_colaborador == '' || pass == ''){
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{
            var p = hex_sha512(pass);
        
            post_data = {
                'n_colaborador': n_colaborador,
                'p': p
            };

            $.ajax({
                type: 'post',
                url: 'includes/login.php',
                data: post_data,
                dataType: 'json',
                error: function(xhr, ajaxOptions, thrownError){
                    alert("Error:\n" + thrownError);
                },
                success: function(response){
                    if(response.success == false){                
                        errordiv.slideDown();
                        error.html(response.text);
                    }else{
                        location = '../maze';
                    }
                }
            });
        }
        
    });
    
});