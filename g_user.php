<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT * FROM utilizadores");
    }else{
        header('Location: index.php');
    }

?>
<script type="text/JavaScript">

$(function(){
    
    $("span.edit").click(function(){
        
        var id_utilizador = this.id;
          
        var url = 'edituser';
        var form = $('<form action="' + url + '" method="post"><input type="text" name="id_utilizador" value="' + id_utilizador + '" /></form>');
        $('body').append(form);
        form.submit();
          
    });

    $("span.delete").click(function(){

        if(!confirm("Tem a certeza que pretende eliminar este lutilizador?")){
            return false;
        }

        var id = this.id;

        post_data = {
            'id': id
        };

        $.ajax({
            type: 'post',
            url: 'includes/del_user.php',
            data: post_data,
            dataType: 'json',
            error: function(xhr, ajaxOptions, thrownError){
                alert("Error:\n" + thrownError);
            },
            success: function(response){
                if(response.success == false){
                    alert("Ocorreu um erro inesperado!")
                }else{
                    $("#"+id).parent().parent().slideUp();
                }
            }
        });

    });

});

</script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Utilizadores</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p class="lead"><a href="adduser"><button type="button" class="btn btn-primary">Adicionar utilizador</button></a></p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Utilizador</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowusers = $sql->fetch_array()){
                        $id_utilizador = $rowusers['id_utilizador'];
                        $nome = $rowusers['nome'];
                        $utilizador = $rowusers['win_user'];
                        $estatuto = $rowusers['cat'];
                ?>
                    <tr>
                        <td><?php echo $nome;?></td>
                        <td><?php echo $utilizador;?></td>
                        <td><?php if($estatuto==3){
                            echo 'Administrador';
                        }else if($estatuto==2){
                            echo 'Line-Leader';
                        }else if($estatuto==1){
                            echo 'POUP';
                        };?></td>
                        <td class="edit">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_utilizador; ?>" 
                                    class="bi bi-pencil edit"></span>
                        </td>
                        <td class="delete">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_utilizador; ?>" 
                                    class="bi bi-trash delete"></span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>