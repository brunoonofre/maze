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
                <span class="input-group-text" id="nome">Nome</span>
                <input type="text" name="nome" class="form-control" aria-label="Nome" aria-describedby="nome">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="n_colaborador">Número Colaborador</span>
                <input type="number" name="n_colaborador" class="form-control" aria-label="Designação" aria-describedby="n_colaborador">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="ccustos">Centro Custos</span>
                <input type="number" name="ccustos" class="form-control" aria-label="Centro de custos" aria-describedby="ccustos">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="departamento">Departamento</span>
                <input type="text" name="departamento" class="form-control" aria-label="Departamento" aria-describedby="departamento">
            </div>
            <div class="input-group">
                <span class="input-group-text" for="tamanho">Tamanho</span>
                <select class="form-select" aria-label="Tamanho" name="tamanho" id="tamanho">
                    <option selected value="" style='display:none;'>Escolha o tamanho</option>
                    <option value="xxs">XXS</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                    <option value="3xl">3XL</option>
                    <option value="4xl">4XL</option>
                    <option value="5xl">5XL</option>
                    <option value="6xl">6XL</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" for="cor">Cor</span>
                <select class="form-select" aria-label="Cor" name="cor" id="cor">
                    <option selected value="" style='display:none;'>Escolha a cor</option>
                    <option value="branco">Branco (Geral)</option>
                    <option value="azulclaro">Azul Claro (Line-Leader)</option>
                    <option value="azulescuro">Azul Escuro (Logistica)</option>
                    <option value="verde">Verde (Cat)</option>
                    <option value="cinzento">Cinzento (Manutenção Mecânica)</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="quantidade">Quantidade</span>
                <input type="number" name="quantidade" class="form-control" aria-label="Quantidade" aria-describedby="quantidade">
            </div>
            <input type="hidden" name="id_utilizador" value="<?php echo $_SESSION['user_id'];?>">
            <p class="lead" style="text-align:center">
                <button id="addbatabtn" style="text-align:center" type="button" class="btn btn-primary">Pedir bata</button>
            </p>
        </div>
    </div>
</div>