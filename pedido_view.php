<?php     

    if($cat==0){
        header('Location: ../maze');
    }
    
    $id_pedido = filter_input(INPUT_POST, 'id_pedido', FILTER_DEFAULT);
    
    $pedidoview = $mysqli->query("SELECT p.data as data,
    l.nome as linha,
    u.nome as requerente,
    p.estado as estado,
    p.lista as lista
    FROM pedidos p
    INNER JOIN linhas l
    ON l.id_linha=p.id_linha
    INNER join utilizadores u
    ON u.id_utilizador=p.id_utilizador
    WHERE p.id_pedido = $id_pedido");

    $notas = $mysqli->query("SELECT * FROM notas WHERE id_pedido = $id_pedido");

    if($pedidoview->num_rows == 0){
        header("Location: pedidos");
        exit;
    }

    $rowpedidoview = $pedidoview->fetch_array();

    $data = $rowpedidoview['data'];
    $linha = $rowpedidoview['linha'];
    $requerente = $rowpedidoview['requerente'];
    $estado = $rowpedidoview['estado'];
    $lista = $rowpedidoview['lista'];
    $lista =  (array) json_decode($rowpedidoview['lista'], true);
    
?>
<script type="text/JavaScript" src="js/pedido_view.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Pedido <?php echo $linha;?></h4>
        </div>
    </div>
    <div class="row">
        <?php if($notas->num_rows == 0){echo '<div class="col-md-3"></div>';} ?>
        <div class="col-md-8">
            <div id="successdiv" class="alert alert-success">
                <strong id="success"></strong>
            </div>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>
            <dl class="row">
                <dt class="col-sm-3">Data</dt>
                <dd class="col-sm-9"><?php echo $data;?></dd>

                <dt class="col-sm-3">Linha</dt>
                <dd class="col-sm-9"><?php echo $linha;?></dd>

                <dt class="col-sm-3">Requerente</dt>
                <dd class="col-sm-9"><?php echo $requerente;?></dd>

                <dt class="col-sm-3">Estado</dt>
                <dd class="col-sm-9"><p>
                    <?php if($estado==1){
                        echo 'Em espera';
                    }elseif($estado==2){
                        echo 'Atendido Parcialmente';
                    }elseif($estado==3){
                        echo 'Atendido';
                    }?>
                </p></dd>

                <dt class="col-sm-3">Lista de Material</dt>
                <dd class="col-sm-9">
                    <dl class="row">
                        <?php 
                            foreach ($lista as $item) {
                                $id = $item['id'];
                                $quantidade = $item['qty'];
                                $sql = $mysqli->query("SELECT part_number, descricao FROM materiais WHERE id_material=$id");
                                $rowlista = $sql->fetch_array();
                                $pn = $rowlista['part_number'];
                                $descricao = $rowlista['descricao'];
                        ?>
                        <dt class="col-sm-1"><?php echo $quantidade;?>x</dt>
                        <dd class="col-sm-3"><?php echo $pn;?></dd>
                        <dd class="col-sm-8"><?php echo $descricao?></dd>
                        <?php } ?>
                    </dl>
                </dd>
            </dl>
            <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>">
            <?php if($estado==1 && $cat==3){?>
            <p class="lead" style="text-align:center">
                <button style="text-align:center" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enviarnota">Atender Parcialmente</button>
                <button id="atbtn" style="text-align:center" type="button" class="btn btn-primary">Atender</button>
            </p>
            <?php }else{?>
            <p class="lead" style="text-align:center">
                <button style="text-align:center" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enviarnota">Enviar Nota</button>
            </p>
            <?php } ?>
        </div>
        <div class="col-md-4">
        <?php if($notas->num_rows != 0){
            while($rownotas=$notas->fetch_array()){
                $nota = $rownotas['nota'];
                $id_utilizador = $rownotas['id_utilizador'];
        ?>
        <div class="card <?php if($id_utilizador==$_SESSION['user_id']){echo 'text-end';}?>">
            <div class="card-body">
                <?php echo $nota;?>
            </div>
        </div>
        <?php }}?>
        </div>
    </div>
</div>
<div class="modal fade" id="enviarnota" tabindex="-1" aria-labelledby="notah" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notah">Escrever nota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="input-group">
                <span class="input-group-text">Nota</span>
                <textarea class="form-control" name="nota" aria-label="Nota"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="atp" value="<?php if($cat==3 && $estado==1){echo 1;}else{echo 0;}?>">
        <input type="hidden" name="id_utilizador" value="<?php echo $_SESSION['user_id']; ?>">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="notabtn" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>
