$(function(){
    
    $("span.edit").click(function(){
           
           var id_linha = this.id;
          
           var url = 'editlinha';
           var form = $('<form action="' + url + '" method="post"><input type="text" name="id_linha" value="' + id_linha + '" /></form>');
           $('body').append(form);
           form.submit();
          
       });

    $("span.delete").click(function(){

        if(!confirm("Tem a certeza que pretende eliminar esta linha?")){
            return false;
        }else if(!confirm("A linha e todos os pedidos relacionados serão apagados! Tem a certeza?")){
            return false;
        }

        var id = this.id;

        post_data = {
            'id': id
        };

        $.ajax({
            type: 'post',
            url: 'includes/del_linha.php',
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