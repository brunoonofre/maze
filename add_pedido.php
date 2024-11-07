<?php    
    if($cat==0){
        header('Location: ../maze');
    }

    $sqllinha = $mysqli->query("SELECT * FROM linhas");
?>
<script type="text/JavaScript" src="js/add_pedido.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Pedir abastecimento</h4>
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
                <label class="input-group-text" for="linha">Linha</label>
                <select class="form-select" aria-label="Linha" name="linha" id="linha">
                    <option selected style='display:none;'>Escolhe uma linha</option>
                    <?php 
                        while($rowlinha = $sqllinha->fetch_array()){
                            $id_linha = $rowlinha['id_linha'];
                            $nome = $rowlinha['nome'];
                    ?>
                    <option value="<?php echo $id_linha;?>"><?php echo $nome;?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="matchecks"></div>
            <div class="input-group">
                <span class="input-group-text">Notas</span>
                <textarea class="form-control" name="nota" aria-label="Notas"></textarea>
            </div>
            <input type="hidden" name="id_utilizador" value="<?php echo $_SESSION['user_id'];?>">
            <p class="lead" style="text-align:center">
                <button id="addpedidobtn" style="text-align:center" type="button" class="btn btn-primary">Pedir abastecimento</button>
            </p>
        </div>
    </div>
</div>