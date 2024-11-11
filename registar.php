<?php    
    $sqldepartamento = $mysqli->query("SELECT * FROM departamentos");
?>
<script type="text/JavaScript" src="js/registar.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Registar</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">    
            <p class="lead" style="text-align:center">
                Bem Vindo! Efectua o registo para usares o Maze Digital!
            </p>
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
                <span class="input-group-text" id="n_colaborador">Nº Colaborador</span>
                <input type="number" name="n_colaborador" class="form-control" aria-label="Nº Colaborador" aria-describedby="n_colaborador">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="email">Email</span>
                <input type="text" name="email" class="form-control" aria-label="Email" aria-describedby="email">
            </div>
            <div class="input-group">
                <label class="input-group-text" for="departamento">Departamento</label>
                <select class="form-select" aria-label="Departamento" name="departamento" id="departamento">
                    <option selected style='display:none;'>Escolhe um departamento</option>
                    <?php 
                        while($rowdepartamento = $sqldepartamento->fetch_array()){
                            $id_departamento = $rowdepartamento['id_departamento'];
                            $nome = $rowdepartamento['nome'];
                            $ccusto = $rowdepartamento['centro_custo'];
                    ?>
                    <option value="<?php echo $id_departamento;?>"><?php echo $nome.' | '.$ccusto;?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="hidden" name="id_utilizador">
            <p class="lead" style="text-align:center">
                <button id="registerbtn" style="text-align:center" type="button" class="btn btn-primary">Registar</button>
            </p>
        </div>
    </div>
</div>