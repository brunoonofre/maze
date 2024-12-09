$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var button = $("#registerbtn");
    var ncolabreg = /^\d+$/;
    var pwreg = /(?=.*\d)(?=.*[a-z]).{6,}/;
    
    errordiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){

        var nome = $("input[name=nome]").val();
        var n_colaborador = $("input[name=n_colaborador]").val();
        var email = $("input[name=email]").val();
        var pass = $("input[name=password]").val();
        var confirmpw = $("input[name=confirmpw]").val();
        var departamento = $('select[name=departamento]').val();
        errordiv.slideUp();

        if(nome == '' || n_colaborador == '' || email == '' || pass == '' || confirmpw == '' || departamento == null){
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else if(!ncolabreg.test(n_colaborador)){
            errordiv.slideDown();
            error.html("O username só pode conter letras, numeros e underscores(_)!");
            return false;
        }else if(pass.length < 6){
            errordiv.slideDown();
            error.html("A palavra-passe deve ter pelo menos 6 digitos!");
            return false;
        }else if(!pwreg.test(pass)){
            errordiv.slideDown();
            error.html("A palavra-passe deve conter letras e numeros!");
            return false;
        }else if(pass != confirmpw){
            errordiv.slideDown();
            error.html("A palavra-passe e a confirmação devem ser iguais!");
            return false;
        }else if(n_colaborador.length != 8){
            errordiv.slideDown();
            error.html("Verifica o nº de colaborador!");
            return false;
        }else{

            var p = hex_sha512(pass);
            
            post_data = {
                'nome': nome,
                'n_colaborador': n_colaborador,
                'email': email,
                'departamento': departamento,
                'p': p
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/registar.php',
                data: post_data,
                dataType: 'json',
                error: function(xhr, ajaxOptions, thrownError){
                    errordiv.slideDown();
                    error.html("Error:\n" + thrownError);
                },
                success: function(response){
                    if(response.success == false){
                        successdiv.slideUp();
                        errordiv.slideDown();
                        error.html(response.text);
                    }else{
                        errordiv.slideUp();
                        location = 'log?success=Registo efectuado com sucesso';
                    }
                }
            });
            
        }
        
    });
    
});