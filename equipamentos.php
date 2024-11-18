<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT e.id_equipamento as id_equipamento,
        l.nome as linha,
        e.nome as nome,
        e.io_corr as io_corr,
        e.io_prev as io_prev
        FROM equipamentos e
        INNER JOIN linhas l
        ON e.id_linha=l.id_linha");
    }else{
        header('Location: ../maze');
    }

?>
<script type="text/JavaScript" src="js/equipamentos.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Equipamentos</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <p class="lead"><a href="addequipamento"><button type="button" class="btn btn-primary">Adicionar equipamento</button></a></p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Linha</th>
                        <th>Internal Order Correctiva</th>
                        <th>Internal Order Preventiva</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowequipamento = $sql->fetch_array()){
                        $id_equipamento = $rowequipamento['id_equipamento'];
                        $nome = $rowequipamento['nome'];
                        $linha = $rowequipamento['linha'];
                        $io_corr = $rowequipamento['io_corr'];
                        $io_prev = $rowequipamento['io_prev'];

                ?>
                    <tr>
                        <td id="<?php echo $id_equipamento;?>"><?php echo $nome;?></td>
                        <td id="<?php echo $id_equipamento;?>"><?php echo $linha;?></td>
                        <td id="<?php echo $id_equipamento;?>"><?php echo $io_corr;?></td>
                        <td id="<?php echo $id_equipamento;?>"><?php echo $io_prev;?></td>
                        <td class="edit">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_equipamento; ?>" 
                                    class="bi bi-pencil edit"></span>
                        </td>
                        <td class="delete">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_equipamento; ?>" 
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
