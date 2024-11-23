<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT *FROM saidas");
    }else{
        header('Location: ../maze');
    }

?>
<script type="text/JavaScript" src="js/saidas.js"></script>
<div class="container">
<div class="row">
    <div class="col">
        <h4 class="display-5 text-center">Saidas</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Part Number</th>
                    <th>Quantidade</th>
                    <th>Internal Order</th>
                    <th>Responsavel</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php 
                while($rowsaida = $sql->fetch_array()){
                    $id_saida = $rowsaida['id_saida'];
                    $data = $rowsaida['data'];
                    $pn = $rowsaida['part_number'];
                    $qty = $rowsaida['quantidade'];
                    $io = $rowsaida['internal_order'];
                    $utilizador = $rowsaida['utilizador'];
                    $sap = $rowsaida['sap'];

            ?>
                <tr>
                    <td id="<?php echo $id_saida;?>"><?php echo $pn;?></td>
                    <td id="<?php echo $id_saida;?>"><?php echo $qty;?></td>
                    <td id="<?php echo $id_saida;?>"><?php echo $io;?></td>
                    <td id="<?php echo $id_saida;?>"><?php echo $utilizador;?></td>
                    <td id="<?php echo $id_saida;?>"><?php echo $data;?></td>
                    <?php if($sap==0){?>
                    <td class="delete">
                        <span style="cursor: pointer;"
                                id="<?php echo $id_saida; ?>" 
                                class="bi bi-trash delete"></span>
                    </td>
                    <?php }else{
                        echo '<td></td>';
                    } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>
</div>
</div>
