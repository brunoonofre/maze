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
        var utilizador = $("input[name=utilizador]").val();
        var estatuto = $("select[name=estatuto]").val();
        var id_utilizador = $("input[name=id_utilizador]").val();
       
        if (nome == "" || utilizador == ""){
            errordiv.slideDown();
            errormsg.html("Deve preencher todos os campos!");
            return false;
        }else{
            errordiv.slideUp();

            post_data = {
                'nome': nome,
                'utilizador': utilizador,
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
                        window.location = 'guser?success=Dados actualizados com sucesso!';
                    }
                }
            });
        }
        
    });



    
});