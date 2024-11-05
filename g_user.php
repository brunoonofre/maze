<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT * FROM utilizadores");
    }else{
        header('Location: index.php');
    }

?>
<script type="text/JavaScript" src="js/g_user.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Utilizadores</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nº Colaborador</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowusers = $sql->fetch_array()){
                        $id_utilizador = $rowusers['id_utilizador'];
                        $nome = $rowusers['nome'];
                        $n_colaborador = $rowusers['n_colaborador'];
                        $estatuto = $rowusers['cat'];
                ?>
                    <tr>
                        <td><?php echo $nome;?></td>
                        <td><?php echo $n_colaborador;?></td>
                        <td><?php if($estatuto==3){
                            echo 'Administrador';
                        }else if($estatuto==2){
                            echo 'Line-Leader';
                        }else if($estatuto==1){
                            echo 'Abastecedor';
                        }else if($estatuto==0){
                            echo 'Colaborador';
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