<?php     
    if($cat<3){
        header('Location: ../maze');
    }

    $sqldepartamento = $mysqli->query("SELECT * FROM departamentos");
?>
<script type="text/JavaScript" src="js/add_linha.js"></script>
<div class="container" id="addlinha">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Adicionar Linha</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">    
            <div id="successdiv" class="alert alert-success">
                <strong id="success"></strong>
            </div>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>  
            <div class="input-group">
                <span class="input-group-text" id="nome">Designação</span>
                <input type="text" name="nome" class="form-control" aria-label="Designação" aria-describedby="nome">
            </div>
            <div class="input-group">
                <label class="input-group-text" for="departamento">Departamento</label>
                <select class="form-select" aria-label="Departamento" name="departamento" id="departamento">
                    <option selected style='display:none;'>Escolhe um Departamento</option>
                    <?php 
                        while($rowdepartamento = $sqldepartamento->fetch_array()){
                            $id_departamento = $rowdepartamento['id_departamento'];
                            $nome = $rowdepartamento['nome'];
                    ?>
                    <option value="<?php echo $id_departamento;?>"><?php echo $nome;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_consumo">Internal Order Consumiveis</span>
                <input type="number" name="io_consumo" class="form-control" aria-label="Iternal Order Consumiveis" aria-describedby="io_consumo">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_moe">Internal Order Mecânica</span>
                <input type="number" name="io_moe" class="form-control" aria-label="Iternal Order Mecânica" aria-describedby="io_moe">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_mfe">Internal Order Testes</span>
                <input type="number" name="io_mfe" class="form-control" aria-label="Iternal Order Testes" aria-describedby="io_mfe">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="equipamentos" value="1" aria-label="Equipamentos?">
                </div>
                <input type="text" disabled class="form-control" Placeholder="Pretende estruturar esta linha por equipamentos?" aria-label="Equipamentos?">
            </div>
            <input type="radio" class="btn-check" name="vs" id="vs1" autocomplete="off" value="smt">
            <label class="btn btn-outline-success" for="vs1">SMT</label>

            <input type="radio" class="btn-check" name="vs" id="vs2" autocomplete="off" value="vscsi">
            <label class="btn btn-outline-success" for="vs2">VS/CSI</label>

            <input type="radio" class="btn-check" name="vs" id="vs3" autocomplete="off" value="cm">
            <label class="btn btn-outline-success" for="vs3">CM</label>
            <p class="lead" style="text-align:center">
                <button id="addlinhabtn" style="text-align:center" type="button" class="btn btn-primary">Adicionar linha</button>
            </p>
        </div>
    </div>
</div>