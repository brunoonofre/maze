$(function(){
   

    var button = $("#editequipbtn");
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
        
        var id_equipamento = $("input[name=id_equipamento").val();
        var nome = $("input[name=nome]").val();
        var linha = $("select[name=linha]").val();
        var io_corr = $("input[name=io_corr]").val();
        var io_prev = $("input[name=io_prev]").val();

       
        if (nome == "" || linha == "" || io_corr == "" || io_prev == ""){
            errordiv.slideDown();
            errormsg.html("Deve preencher todos os campos!");
            return false;
        }else{
            errordiv.slideUp();

            post_data = {
                'id_equipamento': id_equipamento,
                'nome': nome,
                'linha': linha,
                'io_corr': io_corr,
                'io_prev': io_prev
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/edit_equipamento.php',
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
                        window.location = 'equipamento?success=Dados actualizados com sucesso!';
                    }
                }
            });
        }
        
    });



    
});