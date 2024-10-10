<?php
    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_DEFAULT);
    
    $sqlmaterial = $mysqli->query("SELECT * FROM materiais");
    $sqleditlinha = $mysqli->query("SELECT * FROM linhas WHERE id_linha =".$id_linha);
    $sqlmatlinha = $mysqli->query("SELECT * FROM material_linha WHERE id_linha =".$id_linha);
    $roweditlinha = $sqleditlinha->fetch_array();

    $nome = $roweditlinha['nome'];
    $ccustos = $roweditlinha['centro_custos'];
    $io = $roweditlinha['internal_order'];
    $matlinha = array();
    while($rowmatlinha = $sqlmatlinha->fetch_array()){
        array_push($matlinha, $rowmatlinha['id_material']);
    };
?>
<script type="text/JavaScript" src="js/edit_linha.js"></script>
<script type="text/JavaScript">
$(function(){

    let matlinha = <?php print(json_encode($matlinha)); ?>+"";
    var matlinhaarr = matlinha.split(",");
    $.each(matlinhaarr,function(i){
        $( "input#"+matlinhaarr[i] ).prop( "checked", true );
    });

});
</script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Editar Linha</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">    
            <div id="successdiv" class="alert alert-success">
                <strong id="success"></strong>
            </div>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>  
            <div class="input-group">
                <span class="input-group-text" id="nome">Designação</span>
                <input type="text" name="nome" value="<?php echo $nome;?>" class="form-control" aria-label="Designação" aria-describedby="nome">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="ccustos">Centro Custos</span>
                <input type="number" name="ccustos" value="<?php echo $ccustos;?>" class="form-control" aria-label="Centro de custos" aria-describedby="ccustos">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io">Internal Order</span>
                <input type="number" name="io" value="<?php echo $io;?>" class="form-control" aria-label="Iternal Order" aria-describedby="io">
            </div>
            <?php
                while($rowmaterial = $sqlmaterial->fetch_array()){
                    $id_material = $rowmaterial['id_material'];
                    $pn = $rowmaterial['part_number'];
                    $descricao = $rowmaterial['descricao'];
            ?>
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" id="<?php echo $id_material?>" value="<?php echo $id_material?>" aria-label="checkbox">
                </div>
                <input value="<?php echo $pn;?>" aria-label="pn" class="form-control" disabled>
                <input value="<?php echo $descricao;?>" aria-label="descricao" class="form-control" disabled>
            </div>
            <?php } ?>
            <input type="hidden" name="id_linha" value="<?php echo $id_linha;?>">
            <p class="lead" style="text-align:center">
                <button id="editlinhabtn" style="text-align:center" type="button" class="btn btn-primary">Editar linha</button>
            </p>
        </div>
    </div>
</div>