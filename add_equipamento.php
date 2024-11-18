<?php     
    if($cat<3){
        header('Location: ../maze');
    }

    $sqllinha = $mysqli->query("SELECT * FROM linhas WHERE equipamentos=1");
?>
<script type="text/JavaScript" src="js/add_equipamento.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Adicionar Equipamento</h4>
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
                <span class="input-group-text" id="nome">Nome</span>
                <input type="text" name="nome" class="form-control" aria-label="Nome" aria-describedby="nome">
            </div>
            <div class="input-group">
                <label class="input-group-text" for="linha">Linha</label>
                <select class="form-select" aria-label="Linha" name="linha" id="linha">
                    <option selected style='display:none;'>Escolhe um linha</option>
                    <?php 
                        while($rowlinha = $sqllinha->fetch_array()){
                            $id_linha = $rowlinha['id_linha'];
                            $nome = $rowlinha['nome'];
                    ?>
                    <option value="<?php echo $id_linha;?>"><?php echo $nome;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_corr">Internal Order Correctivas</span>
                <input type="number" name="io_corr" class="form-control" aria-label="Iternal Order Correctivas" aria-describedby="io_corr">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_prev">Internal Order Preventivas</span>
                <input type="number" name="io_prev" class="form-control" aria-label="Iternal Order Preventivas" aria-describedby="io_prev">
            </div>
            <p class="lead" style="text-align:center">
                <button id="addequipbtn" style="text-align:center" type="button" class="btn btn-primary">Adicionar equipamento</button>
            </p>
        </div>
    </div>
</div>