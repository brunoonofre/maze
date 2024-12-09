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
            <h4 class="display-5 text-center">Saidas de Material</h4>
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
            <p class="lead">
                <button style="text-align:center" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sapoutput">Output SAP</button>
            </p>
            <table class="table table-hover">
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
                        $unixData = strtotime($data);

                ?>
                    <tr class="<?php if($sap==0){echo 'table-warning';}?>">
                        <td id="<?php echo $id_saida;?>"><?php echo $pn;?></td>
                        <td id="<?php echo $id_saida;?>"><?php echo $qty;?></td>
                        <td id="<?php echo $id_saida;?>"><?php echo $io;?></td>
                        <td id="<?php echo $id_saida;?>"><?php echo $utilizador;?></td>
                        <td id="<?php echo $id_saida;?>"><?php echo date("d/m/Y h:i:s", $unixData);?></td>
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
<div class="modal fade" id="sapoutput" tabindex="-1" aria-labelledby="sapoutputh" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="sapoutputh">Output para Sap</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="errormodal" class="alert alert-danger">
                <strong id="errormod"></strong>
            </div>
            <?php $sqlio = $mysqli->query("SELECT internal_order FROM saidas WHERE sap = 0 GROUP BY internal_order");
                while($rowio = $sqlio->fetch_assoc()){
                    $io = $rowio['internal_order'];
                
            ?>
            <div class="row">
                <blockquote class="blockquote iocheck">
                    <p><?php echo $io;?></p>
                    <input class="form-check-input" type="checkbox" value="<?php echo $io?>" name="io">
                </blockquote>
                
                <?php $sqlpn = $mysqli->query("SELECT part_number FROM saidas WHERE internal_order = $io AND sap = 0");
                    $sqlqty = $mysqli->query("SELECT quantidade FROM saidas WHERE internal_order = $io AND sap = 0");?>
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                        <?php while($rowpn = $sqlpn->fetch_assoc()){
                        $pn = $rowpn['part_number'];
                        ?>
                            <tr>
                                <td><?php echo $pn;?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                        <?php while($rowqty = $sqlqty->fetch_assoc()){
                        $qty = $rowqty['quantidade'];
                        ?>
                            <tr>
                                <td><?php echo $qty;?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="modal-footer">
            <button type="button" id="outputbtn" class="btn btn-primary">Registar Baixa</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
  </div>
</div>

