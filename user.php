<?php
    $sql = $mysqli->query("SELECT * FROM utilizadores WHERE id_utilizador =". $_SESSION['user_id']);
    $rowuser = $sql->fetch_assoc();

    $id_utilizador = $rowuser['id_utilizador'];
    $nome = $rowuser['nome'];
    $n_colaborador = $rowuser['n_colaborador'];
    $email = $rowuser['email'];
    $estatuto = $rowuser['cat'];
?>
<script type="text/JavaScript" src="js/user.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Perfil de Utilizador</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div id="successdiv" class="alert alert-success">
                <strong id="success"></strong>
            </div>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>
            <dl class="row">

                <dt class="col-sm-4">Nome</dt>
                <dd class="col-sm-8"><?php echo $nome;?></dd>

                <dt class="col-sm-4">Nº Colaborador</dt>
                <dd class="col-sm-8"><?php echo $n_colaborador;?></dd>

                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8"><?php echo $email;?></dd>

                <dt class="col-sm-4">Estatuto</dt>
                <dd class="col-sm-8"><p>
                    <?php if($estatuto==3){
                        echo 'Administrador';
                    }elseif($estatuto==2){
                        echo 'Abastecedor';
                    }elseif($estatuto==1){
                        echo 'Colaborador';
                    }?>
                </p></dd>
            </dl>
            <input type="hidden" name="id_utilizador" value="<?php echo $id_utilizador;?>">
            <p class="lead" style="text-align:center">
                <button id="edituserbtn" style="text-align:center" type="button" class="btn btn-primary">Editar Perfil</button>
            </p>
        </div>
    </div>
</div>
