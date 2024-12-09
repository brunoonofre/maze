<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT * FROM saida_pedidos ORDER BY sap ASC");
    }else{
        header('Location: ../maze');
    }

?>
<script type="text/JavaScript" src="js/baixa_pedidos.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Registos de Abastecimento</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <div id="successdiv" class="alert alert-success">
                <strong id="success"></strong>
            </div>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Internal Order</th>
                        <th>Pedido</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowsaida = $sql->fetch_array()){
                        $id = $rowsaida['id_saida_pedido'];
                        $id_pedido = $rowsaida['id_pedido'];
                        $io = $rowsaida['io'];
                        $lista = $rowsaida['lista'];
                        $sap = $rowsaida['sap'];

                ?>
                    <tr class="<?php if($sap==0){echo 'table-warning';}?>">
                        <td id="<?php echo $id;?>"><?php echo $io;?></td>
                        <td id="<?php echo $id;?>"><?php echo $id_pedido;?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div class="modal fade" id="sapoutput" tabindex="-1" aria-labelledby="sapoutputh" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div id="modalcontent"></div>
    </div>
  </div>
</div>

