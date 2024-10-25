<?php
    
    $sql = $mysqli->query("SELECT * FROM departamentos");
    
?>
<script type="text/JavaScript" src="js/add_departamento.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Adicionar Departamento</h4>
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
                <span class="input-group-text" id="nome">Nome</span>
                <input type="text" name="nome" class="form-control" aria-label="Nome" aria-describedby="nome">
            </div>
            <p class="lead" style="text-align:center">
                <button id="adddepartamentobtn" style="text-align:center" type="button" class="btn btn-primary">Adicionar Departamento</button>
            </p>
        </div>
    </div>
</div>