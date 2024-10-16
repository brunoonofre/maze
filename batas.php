<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT * FROM batas");
    }else{
        $sql = $mysqli->query("SELECT * FROM batas
                                    WHERE id_utilizador=".$_SESSION['user_id']);
    }

?>
<script type="text/JavaScript" src="js/batas.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Batas</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p class="lead"><a href="addbatas"><button type="button" class="btn btn-primary">Pedir batas</button></a></p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Colaborador</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowpedidos = $sql->fetch_array()){
                        $id_bata = $rowpedidos['id_bata'];
                        $nome = $rowpedidos['nome'];
                        $estado = $rowpedidos['estado'];
                ?>
                    <tr class="<?php if($estado==1){
                        echo 'table-warning';
                    }elseif($estado==2){
                        echo 'table-info';
                    }elseif($estado==3){
                        echo 'table-success';
                    }?>">
                        <td id="<?php echo $id_bata;?>"><?php echo $nome;?></td>
                        <td id="<?php echo $id_bata;?>">
                            <?php if($estado==1){ 
                                echo 'Em espera';
                            }elseif($estado==2){
                                echo 'Encomendado';
                            }elseif($estado==3){
                                echo 'Pronto a levantar';
                            }?>
                        </td>
                        <td class="delete">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_bata; ?>" 
                                    class="bi bi-trash delete"></span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>