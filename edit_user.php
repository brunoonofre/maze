<?php
    
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_DEFAULT);

    $sqledituser = $mysqli->query("SELECT * FROM utilizadores WHERE id_utilizador = ".$id_utilizador);
    $rowedituser = $sqledituser->fetch_array();

    $sqldepartamento = $mysqli->query("SELECT * FROM departamentos");

    $nome = $rowedituser['nome'];
    $n_colaborador = $rowedituser['n_colaborador'];
    $email = $rowedituser['email'];
    $estatuto = $rowedituser['cat'];
    $departamento = $rowedituser['departamento'];
?>
<script type="text/JavaScript" src="js/edit_user.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Editar Utilizador</h4>
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
            <div class="input-group">
                <span class="input-group-text" id="n_colaborador">Nº Colaborador</span>
                <input type="text" name="n_colaborador" value="<?php echo $n_colaborador;?>" class="form-control" aria-label="Nº Colaborador" aria-describedby="n_colaborador">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="email">Email</span>
                <input type="text" name="email" value="<?php echo $email;?>" class="form-control" aria-label="Email" aria-describedby="email">
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
                    <option <?php if($id_departamento==$departamento){echo 'selected';}?> value="<?php echo $id_departamento;?>"><?php echo $nome.' | '.$ccusto;?></option>
                    <?php } ?>
                </select>
            </div>
            <?php if($cat==3){?>
            <div class="input-group">
                <span class="input-group-text" for="categoria">Categoria</span>
                <select class="form-select" aria-label="Categoria" name="estatuto" id="estatuto">
                <?php if ($estatuto == 3){?>
                    <option value="3" selected>Administrador</option>
                    <option value="2">Line-Leader</option>
                    <option value="1">Abastecedor</option>
                    <option value="0">Colaborador</option>
                    <?php }else if ($estatuto == 2){?>
                    <option value="3">Administrador</option>
                    <option value="2" selected>Line-Leader</option>
                    <option value="1">Abastecedor</option>
                    <option value="0">Colaborador</option>
                    <?php }else if ($estatuto == 1){?>
                    <option value="3">Administrador</option>
                    <option value="2">Line-Leader</option>
                    <option value="1" selected>Abastecedor</option>
                    <option value="0">Colaborador</option>
                    <?php }else if ($estatuto == 0){?>
                    <option value="3">Administrador</option>
                    <option value="2">Line-Leader</option>
                    <option value="1">Abastecedor</option>
                    <option value="0" selected>Colaborador</option>
                <?php }?>
                </select>
            </div>
            <input type="hidden" name="redirpage" value="guser">
            <?php }else{?>
            <select name="estatuto" hidden>
                <option value="<?php echo $estatuto?>" selected>estatuto</option>
            </select>
            <input type="hidden" name="redirpage" value="puser">
            <?php } ?>
            <input type="hidden" name="id_utilizador" value="<?php echo $id_utilizador;?>">
            <p class="lead" style="text-align:center">
                <button id="edituserbtn" style="text-align:center" type="button" class="btn btn-primary">Editar utilizador</button>
            </p>
        </div>
    </div>
</div>