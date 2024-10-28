<?php
    $sql = $mysqli->query("SELECT * FROM departamentos");
?>
<script type="text/JavaScript" src="js/add_batas.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Pedir Batas</h4>
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
                <span class="input-group-text" id="nome">Nome na bata</span>
                <input type="text" name="nome" class="form-control" aria-label="Nome" aria-describedby="nome">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="n_colaborador">Número Colaborador</span>
                <input type="number" name="n_colaborador" class="form-control" aria-label="Designação" aria-describedby="n_colaborador">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="ccustos">Centro Custo</span>
                <input type="number" name="ccustos" class="form-control" aria-label="Centro de custos" aria-describedby="ccustos">
            </div>
            <div class="input-group">
                <span class="input-group-text" for="departamento">Departamento</span>
                <select class="form-select" aria-label="Departamento" name="departamento" id="departamento">
                    <option selected value="" style='display:none;'>Escolha o departamento</option>
                <?php while($rowdepart = $sql->fetch_assoc()){?>
                    <option value="<?php echo $rowdepart['id_departamento']?>"><?php echo $rowdepart['nome']?></option>
                <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" for="tamanho">Tamanho</span>
                <select class="form-select" aria-label="Tamanho" name="tamanho" id="tamanho">
                    <option selected value="" style='display:none;'>Escolha o tamanho</option>
                    <option value="XXS">XXS</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="3XL">3XL</option>
                    <option value="4XL">4XL</option>
                    <option value="5XL">5XL</option>
                    <option value="6XL">6XL</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" for="cor">Cor</span>
                <select class="form-select" aria-label="Cor" name="cor" id="cor">
                    <option selected value="" style='display:none;'>Escolha a cor</option>
                    <option value="Branco">Branco (Geral)</option>
                    <option value="Azulclaro">Azul Claro (Line-Leader)</option>
                    <option value="Azulescuro">Azul Escuro (Logistica)</option>
                    <option value="Verde">Verde (Cat)</option>
                    <option value="Cinzento">Cinzento (Manutenção Mecânica)</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" for="quantidade">Quantidade</span>
                <select class="form-select" aria-label="Quantidade" name="quantidade" id="quantidade">
                    <option selected value="" style='display:none;'>Escolha a quantidade</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <input type="hidden" name="id_utilizador" value="<?php echo $_SESSION['user_id'];?>">
            <p class="lead" style="text-align:center">
                <button id="addbatabtn" style="text-align:center" type="button" class="btn btn-primary">Pedir bata</button>
            </p>
        </div>
    </div>
</div>