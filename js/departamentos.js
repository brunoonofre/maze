$(function(){
    
    $("span.edit").click(function(){
           
           var id_departamento = this.id;
          
           var url = 'editdepartamento';
           var form = $('<form action="' + url + '" method="post"><input type="text" name="id_departamento" value="' + id_departamento + '" /></form>');
           $('body').append(form);
           form.submit();
          
       });

    $("span.delete").click(function(){

        if(!confirm("Tem a certeza que pretende eliminar este departamento?")){
            return false;
        }

        var id = this.id;

        post_data = {
            'id': id
        };

        $.ajax({
            type: 'post',
            url: 'includes/del_departamento.php',
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