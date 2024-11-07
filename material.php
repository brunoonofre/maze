<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT * FROM materiais");
    }else{
        header('Location: ../maze');
    }

?>
<script type="text/JavaScript" src="js/material.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Material</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="lead"><a href="addmaterial"><button type="button" class="btn btn-primary">Adicionar material</button></a></p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Part Number</th>
                        <th>Descrição</th>
                        <th>Localização</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowmateriais = $sql->fetch_array()){
                        $id_material = $rowmateriais['id_material'];
                        $pn = $rowmateriais['part_number'];
                        $descricao = $rowmateriais['descricao'];
                        $localizacao = $rowmateriais['localizacao'];
                ?>
                    <tr>
                        <td id="<?php echo $id_material;?>"><?php echo $pn;?></td>
                        <td id="<?php echo $id_material;?>"><?php echo $descricao;?></td>
                        <td id="<?php echo $id_material;?>"><?php echo $localizacao;?></td>
                        <td class="edit">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_material; ?>" 
                                    class="bi bi-pencil edit"></span>
                        </td>
                        <td class="delete">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_material; ?>" 
                                    class="bi bi-trash delete"></span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
