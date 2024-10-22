$(function(){

    $("td:not(.delete)").click(function(){
        var id_bota = this.id;
        var url = 'botaview';
        var form = $('<form action="' + url + '" method="post"><input type="hidden" name="id_bota" value="' + id_bota + '" /></form>');
        $('body').append(form);
        form.submit();
    });


    $("span.delete").click(function(){

        if(!confirm("Pretende eliminar este pedido?")){
            return false;
        }else if(!confirm("Tem a certeza?")){
            return false;
        }

        var id = this.id;

        post_data = {
            'id': id
        };

        $.ajax({
            type: 'post',
            url: 'includes/del_bota.php',
            data: post_data,
            dataType: 'json',
            error: function(xhr, ajaxOptions, thrownError){
                alert("Error:\n" + thrownError);
            },
            success: function(response){
                if(response.success == false){
                    alert("Ocorreu um erro inesperado!")
                }else{
                    $("#"+id).parent().slideUp();
                }
            }
        });

    });

});