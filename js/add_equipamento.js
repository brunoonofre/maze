$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    var button = $("#addequipbtn");
    
    errordiv.hide();
    successdiv.hide();
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });
    
    button.click(function(){
        
        if($('input[name=nome]').val() == '' ||$('select[name=linha]').val() == '' ||$('input[name=io_corr]').val() == '' ||$('input[name=io_prev]').val() == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var nome = $('input[name=nome]').val();
            var linha = $('select[name=linha]').val();
            var io_corr = $('input[name=io_corr]').val();
            var io_prev = $('input[name=io_prev]').val();
            
            post_data = {
                'nome': nome,
                'linha': linha,
                'io_corr': io_corr,
                'io_prev': io_prev
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_equipamento.php',
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
                        location = 'equipamento';
                    }
                }
            });
            
        }
        
    });
    
});