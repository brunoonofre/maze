$(function(){
   
    var button = $("#editmatbtn");
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
        
        var pn = $("input[name=pn]").val();
        var descricao = $("input[name=descricao]").val();
        var localizacao = $("input[name=localizacao]").val();
        var id_material = $("input[name=id_material]").val();
       
        if (pn == "" || descricao == "" || localizacao == ""){
            errordiv.slideDown();
            errormsg.html("Deve preencher todos os campos!");
            return false;
        }else{
            errordiv.slideUp();

            post_data = {
                'pn': pn,
                'descricao': descricao,
                'localizacao': localizacao,
                'id_material': id_material
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/edit_material.php',
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
                        window.location = 'materia?success=Dados actualizados com sucesso!';
                    }
                }
            });
        }
        
    });
    
});