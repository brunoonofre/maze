<?php
    $success = filter_input(INPUT_GET, 'success', FILTER_DEFAULT);
?>
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/login.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Entrar</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (!empty($success)) {?>
            <div id="successdiv" class="alert alert-success">
                <strong><?php echo $success; ?></strong>
            </div>
            <?php } ?>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="n_colaborador">Nº Colaborador</span>
                <input type="number" name="n_colaborador" class="form-control" aria-label="Nº Colaborador" aria-describedby="n_colaborador">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="password">Password</span>
                <input type="password" name="password" class="form-control" aria-label="Password" aria-describedby="password">
            </div>
            <p class="lead" style="text-align:center">
                <button id="loginbtn" style="text-align:center" type="button" class="btn btn-primary">Entrar</button>
            </p>
        </div>
    </div>
</div>