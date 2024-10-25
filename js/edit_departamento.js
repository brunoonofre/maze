$(function(){
   
    var button = $("#editdepartamentobtn");
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
        
        var id_departamento = $("input[name=id_departamento]").val();
        var nome = $("input[name=nome]").val();
       
        if (nome == ""){
            errordiv.slideDown();
            errormsg.html("Deve preencher todos os campos!");
            return false;
        }else{
            errordiv.slideUp();

            post_data = {
                'id_departamento': id_departamento,
                'nome': nome
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/edit_departamento.php',
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
                        window.location = 'departamento';
                    }
                }
            });
        }
        
    });



    
});