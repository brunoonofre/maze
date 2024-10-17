<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT * FROM linhas");
    }else{
        header('Location: index.php');
    }

?>
<script type="text/JavaScript">

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

</script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Linhas</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <p class="lead"><a href="addlinha"><button type="button" class="btn btn-primary">Adicionar linha</button></a></p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Linha</th>
                        <th>Centro Custos</th>
                        <th>Internal Order</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowlinha = $sql->fetch_array()){
                        $id_linha = $rowlinha['id_linha'];
                        $nome = $rowlinha['nome'];
                        $ccustos = $rowlinha['centro_custos'];
                        $io = $rowlinha['internal_order'];
                ?>
                    <tr>
                        <td id="<?php echo $id_linha;?>"><?php echo $nome;?></td>
                        <td id="<?php echo $id_linha;?>"><?php echo $ccustos;?></td>
                        <td id="<?php echo $id_linha;?>"><?php echo $io;?></td>
                        <td class="edit">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_linha; ?>" 
                                    class="bi bi-pencil edit"></span>
                        </td>
                        <td class="delete">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_linha; ?>" 
                                    class="bi bi-trash delete"></span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
