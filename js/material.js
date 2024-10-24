$(function(){
    
    $("span.edit").click(function(){
           
           var id_mat = this.id;
          
           var url = 'editmaterial';
           var form = $('<form action="' + url + '" method="post"><input type="text" name="id" value="' + id_mat + '" /></form>');
           $('body').append(form);
           form.submit();
          
       });

    $("span.delete").click(function(){

        if(!confirm("Prentede eliminar este material?")){
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
            url: 'includes/del_material.php',
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