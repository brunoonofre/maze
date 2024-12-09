<?php    
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    sec_session_start();

    $id_saida_pedido = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    $sqloutputsap = $mysqli->query("SELECT * FROM saida_pedidos WHERE id_saida_pedido = ".$id_saida_pedido);

    $rowoutputsap = $sqloutputsap->fetch_assoc();
    
    $io = $rowoutputsap['io'];
    $lista = $rowoutputsap['lista'];
    $lista =  (array) json_decode($rowoutputsap['lista'], true);
    $sap = $rowoutputsap['sap'];

?>
<script type="text/JavaScript" src="js/modal_pedidos.js"></script>
<div class="modal-header">
    <h5 class="modal-title" id="sapoutputh">Output para Sap</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div id="errormodal" class="alert alert-danger">
        <strong id="errormod"></strong>
    </div>
    <div class="row">
        <blockquote class="blockquote iocheck">
            <p><?php echo $io;?></p>
        </blockquote>
        <div class="col-md-6">
            <table class="table">
                <tbody>
                    <?php 
                        foreach ($lista as $item) {
                            $id = $item['id'];
                            $quantidade = $item['qty'];
                            $sql = $mysqli->query("SELECT part_number FROM materiais WHERE id_material=$id");
                            $rowlista = $sql->fetch_assoc();
                            $pn = $rowlista['part_number'];
                    ?>   
                    <tr>
                        <td><?php echo $pn;?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table">
                <tbody>
                    <?php 
                        foreach ($lista as $item) {
                            $id = $item['id'];
                            $quantidade = $item['qty'];;
                    ?>   
                    <tr>
                        <td><?php echo $quantidade;?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if($sap == 0){ ?>
    <input type="hidden" name="id_saida_pedido" value="<?php echo $id_saida_pedido;?>">
    <button type="button" id="outputbtn" class="btn btn-primary">Registar Baixa</button>
    <?php } ?>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
</div>