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
                <input type="radio" class="btn-check" name="admissao" id="admissao1" autocomplete="off" checked value="1">
                <label class="btn btn-outline-primary admissao" for="admissao1">Admissão</label>

                <input type="radio" class="btn-check" name="admissao" id="admissao2" autocomplete="off" value="0">
                <label class="btn btn-outline-primary" for="admissao2">Renovação</label>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="nome">Nome na bata</span>
                <input type="text" name="nome" class="form-control" aria-label="Nome" aria-describedby="nome" value="<?php echo $username;?>">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="n_colaborador">Número Colaborador</span>
                <input type="number" name="n_colaborador" class="form-control" aria-label="Designação" aria-describedby="n_colaborador" value="<?php echo $usern;?>">
            </div>
            <div class="input-group">
                <span class="input-group-text" for="ccusto">Centro de custo</span>
                <select class="form-select" aria-label="Centro de custo" name="ccusto" id="ccusto">
                <?php while($rowdepart = $sql->fetch_assoc()){
                    $id_departamento = $rowdepart['id_departamento'];
                    $nome = $rowdepart['nome'];
                    $ccusto = $rowdepart['centro_custo'];
                    ?>
                    <option <?php if($id_departamento=$userdep){echo 'selected';}?> value="<?php echo $id_departamento?>"><?php echo $ccusto.' | '.$nome?></option>
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
                    <option value="Branco (Geral)">Branco (Geral)</option>
                    <option value="Branco Tutor (Nome Azul)">Branco Tutor (Nome Azul)</option>
                    <option value="Branco s/Nome (Temporário)">Branco s/Nome (Temporário)</option>
                    <option value="Azul Claro (Line-Leader)">Azul Claro (Line-Leader)</option>
                    <option value="Azul Escuro (Logistica)">Azul Escuro (Logistica)</option>
                    <option value="Verde (Cat)">Verde (Cat)</option>
                    <option value="Cinzento (Manutenção Mecânica)">Cinzento (Manutenção Mecânica)</option>
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