<?php 
    
    $id_bata = filter_input(INPUT_POST, 'id_bata', FILTER_DEFAULT);
    
    $bataview = $mysqli->query("SELECT b.n_colaborador as n_colaborador,
    b.admissao as admissao,
    b.nome as nome,
    b.centro_custos as centro_custos,
    d.nome as departamento,
    b.tamanho as tamanho,
    b.cor as cor,
    b.quantidade as quantidade,
    b.estado as estado,
    b.data as data
    FROM batas b 
    INNER JOIN departamentos d
    ON d.id_departamento = b.departamento 
    WHERE id_bata = $id_bata");

    if($bataview->num_rows == 0){
        header("Location: bata");
        exit;
    }

    $rowbataview = $bataview->fetch_array();

    $n_colaborador = $rowbataview['n_colaborador'];
    $admissao = $rowbataview['admissao'];
    $nome = $rowbataview['nome'];
    $ccustos = $rowbataview['centro_custos'];
    $departamento = $rowbataview['departamento'];
    $tamanho = $rowbataview['tamanho'];
    $cor = $rowbataview['cor'];
    $quantidade = $rowbataview['quantidade'];
    $estado = $rowbataview['estado'];
    $data = $rowbataview['data'];
    
?>
<script type="text/JavaScript" src="js/bata_view.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Pedido de Batas</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div id="successdiv" class="alert alert-success">
                <strong id="success"></strong>
            </div>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>
            <dl class="row">
                <dt class="col-sm-4">Data</dt>
                <dd class="col-sm-8"><?php echo $data;?></dd>

                <dt class="col-sm-4">Motivo de pedido</dt>
                <dd class="col-sm-8"><?php if($admissao==1){echo 'Admissão';}else if($admissao==0){echo 'Renovação';}?></dd>

                <dt class="col-sm-4">Nome na Bata</dt>
                <dd class="col-sm-8"><?php echo $nome;?></dd>

                <dt class="col-sm-4">Nº Colaborador</dt>
                <dd class="col-sm-8"><?php echo $n_colaborador;?></dd>

                <dt class="col-sm-4">Departamento</dt>
                <dd class="col-sm-8"><?php echo $departamento;?></dd>

                <dt class="col-sm-4">Centro de Custos</dt>
                <dd class="col-sm-8"><?php echo $ccustos;?></dd>

                <dt class="col-sm-4">Tamanho</dt>
                <dd class="col-sm-8"><?php echo $tamanho;?></dd>

                <dt class="col-sm-4">Cor</dt>
                <dd class="col-sm-8"><?php echo $cor;?></dd>

                <dt class="col-sm-4">Quantidade</dt>
                <dd class="col-sm-8"><?php echo $quantidade;?></dd>

                <dt class="col-sm-4">Estado</dt>
                <dd class="col-sm-8"><p>
                    <?php if($estado==1){
                        echo 'Em espera';
                    }elseif($estado==2){
                        echo 'Encomendado';
                    }elseif($estado==3){
                        echo 'Pronto a Levantar';
                    }?>
                </p></dd>
            </dl>
            <input type="hidden" name="id_bata" value="<?php echo $id_bata;?>">
            <?php if($estado==1 && $cat==3){?>
            <p class="lead" style="text-align:center">
                <input type="hidden" name="estado" value="2">
                <button id="batabtn" style="text-align:center" type="button" class="btn btn-primary">Encomendado</button>
            </p>
            <?php }else if($estado==2 && $cat==3){?>
            <p class="lead" style="text-align:center">
                <input type="hidden" name="estado" value="3">
                <button id="batabtn" style="text-align:center" type="button" class="btn btn-primary">Pronto a Levantar</button>
            </p>
            <?php } ?>
        </div>
    </div>
</div>
