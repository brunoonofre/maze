<?php    
    if($cat<3){
        header('Location: ../maze');
    }
    
    $sql = $mysqli->query("SELECT * FROM departamentos");
    
?>
<script type="text/JavaScript" src="js/add_saida.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Saidas de material</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">    
            <div id="successdiv" class="alert alert-success">
                <strong id="success"></strong>
            </div>
            <div id="errordiv" class="alert alert-danger">
                <strong id="error"></strong>
            </div>  
            <div class="input-group">
                <span class="input-group-text" id="utilizador">Utilizador</span>
                <input type="text" name="utilizador" class="form-control" aria-label="Utilizador" aria-describedby="utilizador">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="pn">Part Number</span>
                <input type="text" name="pn" class="form-control" aria-label="Part Number" aria-describedby="pn">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="qty">Quantidade</span>
                <input type="number" name="qty" class="form-control" aria-label="Quantidade" aria-describedby="qty">
            </div>
            <div class="input-group">
                <input type="radio" class="btn-check" name="tipo" id="tipo1" autocomplete="off" value="moe">
                <label class="btn btn-outline-primary admissao" for="tipo1">M.Mecânica</label>

                <input type="radio" class="btn-check" name="tipo" id="tipo2" autocomplete="off" value="mfe">
                <label class="btn btn-outline-primary" for="tipo2">M.Testes</label>

                <input type="radio" class="btn-check" name="tipo" id="tipo3" autocomplete="off" value="cns">
                <label class="btn btn-outline-primary" for="tipo3">Consumo</label>

                <input type="radio" class="btn-check" name="tipo" id="tipo4" autocomplete="off" value="dpt">
                <label class="btn btn-outline-primary" for="tipo4">Departamento</label>
            </div>
            <div id="moeselect">
                <div class="input-group">
                    <input type="radio" class="btn-check" name="moe" id="moe1" autocomplete="off" value="moe1">
                    <label class="btn btn-outline-primary admissao" for="moe1">SMT</label>

                    <input type="radio" class="btn-check" name="moe" id="moe2" autocomplete="off" value="moe2">
                    <label class="btn btn-outline-primary" for="moe2">VS</label>

                    <input type="radio" class="btn-check" name="moe" id="moe3" autocomplete="off" value="moe3">
                    <label class="btn btn-outline-primary" for="moe3">CSI</label>

                    <input type="radio" class="btn-check" name="moe" id="moe4" autocomplete="off" value="moe4">
                    <label class="btn btn-outline-primary" for="moe4">CM</label>
                </div>
            </div>
            <div id="ioselect"></div>
            <p class="lead" style="text-align:center">
                <button id="saidabtn" style="text-align:center" type="button" class="btn btn-primary">Registar saida</button>
            </p>
        </div>
    </div>
</div>
<div class="modal fade" id="outmodal" tabindex="-1" aria-labelledby="outconfirmh" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="outconfirmh">Saida de Material</h5>
        </div>
        <div class="modal-body">
            Saida de material registada com sucesso!
        </div>
        <div class="modal-footer">
            <button type="button" id="addoutbtn" class="btn btn-primary">Registar+</button>
            <button type="button" id="sairbtn" class="btn btn-secondary">Sair</button>
        </div>
    </div>
  </div>
</div>