<?php
    
    if($cat<3){
        header('Location: ../maze');
    }

    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_DEFAULT);
    
    $sqlmaterial = $mysqli->query("SELECT * FROM materiais");
    $sqldepartamento = $mysqli->query("SELECT * FROM departamentos");
    
    $sqleditlinha = $mysqli->query("SELECT * FROM linhas WHERE id_linha =".$id_linha);
    $roweditlinha = $sqleditlinha->fetch_array();

    $nome = $roweditlinha['nome'];
    $departamento = $roweditlinha['departamento'];
    $io_consumo = $roweditlinha['io_consumo'];
    $io_moe = $roweditlinha['io_moe'];
    $io_mfe = $roweditlinha['io_mfe'];
    $equipamentos = $roweditlinha['equipamentos'];
    $vs = $roweditlinha['vs'];

    $sqlmatlinha = $mysqli->query("SELECT * FROM material_linha WHERE id_linha =".$id_linha);
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
<div class="container" id="editlinha">
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
                <label class="input-group-text" for="departamento">Departamento</label>
                <select class="form-select" aria-label="Departamento" name="departamento" id="departamento">
                    <?php 
                        while($rowdepartamento = $sqldepartamento->fetch_array()){
                            $id_departamento = $rowdepartamento['id_departamento'];
                            $nome = $rowdepartamento['nome'];
                    ?>
                    <option value="<?php echo $id_departamento.'"'; if($id_departamento==$departamento){echo 'selected';}?>><?php echo $nome;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_consumo">Internal Order Consumiveis</span>
                <input type="number" name="io_consumo" value="<?php echo $io_consumo;?>" class="form-control" aria-label="Iternal Order Consumiveis" aria-describedby="io_consumo">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_moe">Internal Order Mecânica</span>
                <input type="number" name="io_moe" value="<?php echo $io_moe;?>"  class="form-control" aria-label="Iternal Order Mecânica" aria-describedby="io_moe">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_mfe">Internal Order Testes</span>
                <input type="number" name="io_mfe" value="<?php echo $io_mfe;?>"  class="form-control" aria-label="Iternal Order Testes" aria-describedby="io_mfe">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" <?php if($equipamentos==1){echo 'checked';}?> type="checkbox" name="equipamentos" value="1" aria-label="Equipamentos?">
                </div>
                    <input type="text" disabled class="form-control" Placeholder="Pretende estruturar esta linha por equipamentos?" aria-label="Equipamentos?">
            </div>
            <input type="radio" class="btn-check" name="vs" id="vs1" autocomplete="off" value="smt" <?php if($vs=='smt'){echo 'checked';}?>>
            <label class="btn btn-outline-success" for="vs1">SMT</label>

            <input type="radio" class="btn-check" name="vs" id="vs2" autocomplete="off" value="vscsi" <?php if($vs=='vscsi'){echo 'checked';}?>>
            <label class="btn btn-outline-success" for="vs2">VS/CSI</label>

            <input type="radio" class="btn-check" name="vs" id="vs3" autocomplete="off" value="cm" <?php if($vs=='cm'){echo 'checked';}?>>
            <label class="btn btn-outline-success" for="vs3">CM</label>
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