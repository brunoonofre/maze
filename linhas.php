<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT l.id_linha as id_linha,
    l.nome as nome,
    d.nome as departamento,
    l.io_consumo as io_consumo,
    l.io_moe as io_moe,
    l.io_mfe as io_mfe,
    l.equipamentos as equipamentos
    FROM linhas l
    INNER JOIN departamentos d
    ON d.id_departamento = l.departamento");
    }else{
        header('Location: ../maze');
    }

?>
<script type="text/JavaScript" src="js/linhas.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Linhas</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="lead"><a href="addlinha"><button type="button" class="btn btn-primary">Adicionar linha</button></a></p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Linha</th>
                        <th>Departamento</th>
                        <th>Internal Order Consumiveis</th>
                        <th>Internal Order Mecânica</th>
                        <th>Internal Order Testes</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowlinha = $sql->fetch_array()){
                        $id_linha = $rowlinha['id_linha'];
                        $nome = $rowlinha['nome'];
                        $departamento = $rowlinha['departamento'];
                        $ioconsumo = $rowlinha['io_consumo'];
                        $iomoe = $rowlinha['io_moe'];
                        $iomfe = $rowlinha['io_mfe'];

                ?>
                    <tr>
                        <td id="<?php echo $id_linha;?>"><?php echo $nome;?></td>
                        <td id="<?php echo $id_linha;?>"><?php echo $departamento;?></td>
                        <td id="<?php echo $id_linha;?>"><?php echo $ioconsumo;?></td>
                        <td id="<?php echo $id_linha;?>"><?php echo $iomoe;?></td>
                        <td id="<?php echo $id_linha;?>"><?php echo $iomfe;?></td>
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
