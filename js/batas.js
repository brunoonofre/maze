$(function(){

    $("td:not(.delete)").click(function(){
        var id_bata = this.id;
        var url = 'bataview';
        var form = $('<form action="' + url + '" method="post"><input type="hidden" name="id_bata" value="' + id_bata + '" /></form>');
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
            url: 'includes/del_bata.php',
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