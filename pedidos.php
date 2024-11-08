<?php
        
    if($cat==0){
        header('Location: ../maze');
    }

    if($cat == 3){
        $sql = $mysqli->query("SELECT p.id_pedido as id_pedido,
                                    p.id_utilizador as id_utilizador,
                                    p.data as data,
                                    l.nome as linha,
                                    u.nome as utilizador,
                                    p.estado as estado
                                    FROM pedidos p
                                    INNER JOIN linhas l
                                    ON l.id_linha=p.id_linha
                                    INNER JOIN utilizadores u
                                    ON u.id_utilizador=p.id_utilizador
                                    ORDER BY p.id_pedido DESC");
    }else{
        $sql = $mysqli->query("SELECT p.id_pedido as id_pedido,
                                    p.id_utilizador as id_utilizador,
                                    p.data as data,
                                    l.nome as linha,
                                    u.nome as utilizador,
                                    p.estado as estado
                                    FROM pedidos p
                                    INNER JOIN linhas l
                                    ON l.id_linha=p.id_linha
                                    INNER JOIN utilizadores u
                                    ON u.id_utilizador=p.id_utilizador
                                    WHERE p.id_utilizador=".$_SESSION['user_id']."
                                    ORDER BY p.id_pedido DESC");
    }

?>
<script type="text/JavaScript" src="js/pedidos.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Pedidos</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="lead"><a href="addpedido"><button type="button" class="btn btn-primary">Pedir abastecimento</button></a></p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Linha</th>
                        <th scope="col">Requerente</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowpedidos = $sql->fetch_array()){
                        $id_pedido = $rowpedidos['id_pedido'];
                        $id_utilizador = $rowpedidos['id_utilizador'];
                        $data = $rowpedidos['data'];
                        $linha = $rowpedidos['linha'];
                        $utilizador = $rowpedidos['utilizador'];
                        $estado = $rowpedidos['estado'];
                        $unixData = strtotime($data);
                ?>
                    <tr class="<?php if($estado==1){
                        echo 'table-warning';
                    }elseif($estado==2){
                        echo 'table-info';
                    }elseif($estado==3){
                        echo 'table-success';
                    }?>">
                        <td id="<?php echo $id_pedido;?>"><?php echo date("d/m/Y", $unixData);?></td>
                        <td id="<?php echo $id_pedido;?>"><?php echo $linha;?></td>
                        <td id="<?php echo $id_pedido;?>"><?php echo $utilizador;?></td>
                        <td id="<?php echo $id_pedido;?>">
                            <?php if($estado==1){ 
                                echo 'Em espera';
                            }elseif($estado==2){
                                echo 'Atendido Parcialmente';
                            }elseif($estado==3){
                                echo ' Atendido';
                            }?>
                        </td>
                        <?php if($id_utilizador==$_SESSION['user_id'] && $estado==1){?>
                        <td class="delete">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_pedido; ?>" 
                                    class="bi bi-trash delete"></span>
                        </td>
                        <?php }else{echo '<td></td>';}?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>