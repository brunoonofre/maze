$(function(){

    var button = $("#batabtn");
    var notabtn = $("#notabtn");
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");

    errordiv.hide();
    successdiv.hide();

    button.click(function(){
        
        if(!confirm("Pretende marcar como encomendado?")){
            return false;
        }else if(!confirm("Tem a certeza?")){
            return false;
        }
        
        var id_bata = $('input[name=id_bata]').val();
        var estado = $('input[name=estado]').val();
        
        post_data = {
            'id_bata': id_bata,
            'estado': estado
        };
        
        $.ajax({
            type: 'post',
            url: 'includes/edit_estado_bata.php',
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
                    location = 'bata';
                }
            }
        });
        
    });

});