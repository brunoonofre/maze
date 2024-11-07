<?php

    if($cat<3){
        header('Location: ../maze');
    }
    
    $id_departamento = filter_input(INPUT_POST, 'id_departamento', FILTER_DEFAULT);

    $sql = $mysqli->query("SELECT * FROM departamentos WHERE id_departamento = $id_departamento");
    $rowdepart = $sql->fetch_assoc();

    $nome = $rowdepart['nome'];
    
?>
<script type="text/JavaScript" src="js/edit_departamento.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Editar Departamento</h4>
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
                <input type="text" name="nome" value="<?php echo $nome;?>" class="form-control" aria-label="Nome" aria-describedby="nome">
            </div>
            <input type="hidden" name="id_departamento" value="<?php echo $id_departamento;?>">
            <p class="lead" style="text-align:center">
                <button id="editdepartamentobtn" style="text-align:center" type="button" class="btn btn-primary">Editar Departamento</button>
            </p>
        </div>
    </div>
</div>