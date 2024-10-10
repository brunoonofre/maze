<?php
    
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_DEFAULT);
    

    $sqledituser = $mysqli->query("SELECT * FROM utilizadores WHERE id_utilizador = ".$id_utilizador);
    $rowedituser = $sqledituser->fetch_array();

    $nome = $rowedituser['nome'];
    $utilizador = $rowedituser['win_user'];
    $estatuto = $rowedituser['cat'];
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
                <span class="input-group-text" id="utilizador">Utilizador</span>
                <input type="text" name="utilizador" value="<?php echo $utilizador;?>" class="form-control" aria-label="Utilizador" aria-describedby="utilizador">
            </div>
            <div class="input-group">
                <span class="input-group-text" for="categoria">Categoria</span>
                <select class="form-select" aria-label="Categoria" name="estatuto" id="estatuto">
                <?php if ($estatuto == 3){?>
                    <option value="3">Administrador</option>
                    <option value="2">Line-Leader</option>
                    <option value="1">POUP</option>
                    <?php }else if ($estatuto == 2){?>
                    <option value="2">Line-Leader</option>
                    <option value="3">Administrador</option>
                    <option value="1">POUP</option>
                    <?php }else if ($estatuto == 1){?>
                    <option value="1">POUP</option>
                    <option value="3">Administrador</option>
                    <option value="2">Line-Leader</option>
                <?php }?>
                </select>
            </div>
            <input type="hidden" name="id_utilizador" value="<?php echo $id_utilizador;?>">
            <p class="lead" style="text-align:center">
                <button id="edituserbtn" style="text-align:center" type="button" class="btn btn-primary">Editar utilizador</button>
            </p>
        </div>
    </div>
</div>