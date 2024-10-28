$(function(){
   
    var button = $("#edituserbtn");
    var successdiv = $("#successdiv");
    var errordiv = $("#errordiv");
    var errormsg = $("#error");
    var successmsg = $("#success");
    
    successdiv.hide();
    errordiv.hide();
    
    $(".form-group").keypress(function(event){
        if(event.which==13){
            button.click();//button
        } 
        
    });
    
    button.click(function(){
        
        var nome = $("input[name=nome]").val();
        var n_colaborador = $("input[name=n_colaborador]").val();
        var email = $("input[name=email]").val();
        var estatuto = $("select[name=estatuto]").val();
        var id_utilizador = $("input[name=id_utilizador]").val();
        var redirpage = $("input[name=redirpage]").val();
       
        if (nome == "" || n_colaborador == ""){
            errordiv.slideDown();
            errormsg.html("Deve preencher todos os campos!");
            return false;
        }else{
            errordiv.slideUp();

            post_data = {
                'nome': nome,
                'n_colaborador': n_colaborador,
                'email': email,
                'estatuto': estatuto,
                'id_utilizador': id_utilizador
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/edit_user.php',
                data: post_data,
                dataType: 'json',
                error: function(xhr, ajaxOptions, thrownError){
                    alert("Error: " + thrownError);
                },
                success: function(response){
                    if(response.success == false){
                        successdiv.slideUp();
                        errordiv.slideDown();
                        errormsg.html(response.text);
                    }else{
                        errordiv.slideUp();
                        window.location = redirpage+'?success=Dados actualizados com sucesso!';
                    }
                }
            });
        }
        
    });



    
});