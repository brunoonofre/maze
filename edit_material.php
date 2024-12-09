<?php    

    if($cat<3){
        header('Location: ../maze');
    }
    
    $id_material = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    

    $sqleditmaterial = $mysqli->query("SELECT * FROM materiais WHERE id_material = ".$id_material);
    $roweditmaterial = $sqleditmaterial->fetch_array();

    $pn = $roweditmaterial['part_number'];
    $descricao = $roweditmaterial['descricao'];
    $localizacao = $roweditmaterial['localizacao'];
    $setup = $roweditmaterial['setup'];
?>
<script type="text/JavaScript" src="js/edit_material.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Editar Material</h4>
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
                <span class="input-group-text" id="pn">Part Number</span>
                <input type="text" name="pn" value="<?php echo $pn;?>" class="form-control" aria-label="Part Number" aria-describedby="pn">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="descricao">Descrição</span>
                <input type="text" name="descricao" value="<?php echo $descricao;?>" class="form-control" aria-label="Descrição" aria-describedby="descricao">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="localizacao">Localização</span>
                <input type="text" name="localizacao" value="<?php echo $localizacao;?>" class="form-control" aria-label="Localização" aria-describedby="io">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="setup" value="1" aria-label="Material de Setup?" <?php if($setup==1){echo 'checked';}?>>
                </div>
                <input type="text" disabled class="form-control" Placeholder="Material de Setup?" aria-label="Material de Setup?">
            </div>
            <input type="hidden" name="id_material" value="<?php echo $id_material;?>">
            <p class="lead" style="text-align:center">
                <button id="editmatbtn" style="text-align:center" type="button" class="btn btn-primary">Editar material</button>
            </p>
        </div>
    </div>
</div>