$(function(){
   

    var button = $("#editlinhabtn");
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

    if($("input[name=equipamentos]").is(':checked')){
        $("input[name=io_moe]").parent().slideUp();
        $("input[name=io_mfe]").parent().slideUp();
    }
    
    $("input[name=equipamentos]").on('change',function(){
        if($("input[name=equipamentos]").is(':checked')){
            $("input[name=io_moe]").parent().slideUp();
            $("input[name=io_mfe]").parent().slideUp();
        }else{
            $("input[name=io_moe]").parent().slideDown();
            $("input[name=io_mfe]").parent().slideDown();
        }
    })
    
    button.click(function(){
        
        var nome = $("input[name=nome]").val();
        var departamento = $("select[name=departamento]").val();
        var io_consumo = $("input[name=io_consumo]").val();
        var id_linha = $("input[name=id_linha]").val();
        var vs = $('input[name=vs]:checked').val();

        $('input[type=checkbox]').not("input[name=equipamentos]").each(function(){

            var id = $(this).val();
            
            if(this.checked){
                var add = 1;
            }else{
                var add = 0;
            }

            post_mat = {
                'id_material': id,
                'id_linha': id_linha,
                'add': add
            };

            $.ajax({
                type: 'post',
                url: 'includes/edit_matlinha.php',
                data: post_mat,
                dataType: 'json'
            });

        });
       
        if (nome == "" || departamento == "" || io_consumo == "" || vs == null){
            errordiv.slideDown();
            errormsg.html("Deve preencher todos os campos!");
            return false;
        }else{
            errordiv.slideUp();

            if($("input[name=equipamentos]").is(':checked')){
                equipamentos = 1;
                var io_moe = null;
                var io_mfe = null;
            }else{
                equipamentos = 0;
                var io_moe = $('input[name=io_moe]').val();
                var io_mfe = $('input[name=io_mfe]').val();
            }

            post_data = {
                'nome': nome,
                'departamento': departamento,
                'io_consumo': io_consumo,
                'io_moe': io_moe,
                'io_mfe': io_mfe,
                'id_linha': id_linha,
                'equipamentos': equipamentos,
                'vs': vs
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/edit_linha.php',
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
                        window.location = 'linha?success=Dados actualizados com sucesso!';
                    }
                }
            });
        }
        
    });



    
});