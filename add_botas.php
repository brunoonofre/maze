<?php
    $sql = $mysqli->query("SELECT * FROM departamentos");
?>
<script type="text/JavaScript" src="js/add_botas.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Pedir Calçado</h4>
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
            <div class="input-group admissao">
                <input type="radio" class="btn-check" name="admissao" id="admissao1" autocomplete="off" checked value="1">
                <label class="btn btn-outline-primary" for="admissao1">Admissão</label>

                <input type="radio" class="btn-check" name="admissao" id="admissao2" autocomplete="off" value="0">
                <label class="btn btn-outline-primary" for="admissao2">Renovação</label>
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
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                </select>
            </div>
            <div class="cardpadding row justify-content-center pdbottom">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/bota.png" class="card-img-top cardimgcenter" alt="...">
                        <div class="card-body">
                            <div class="form-check form-check-reverse">
                                <input class="form-check-input" type="radio" name="tipo" value="Bota" id="tipo1">
                                <label class="form-check-label" for="tipo1">
                                    <h5 class="card-title">Bota</h5>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/sandalia.png" class="card-img-top cardimgcenter" alt="...">
                        <div class="card-body">
                            <div class="form-check form-check-reverse">
                                <input class="form-check-input" type="radio" name="tipo" value="Sandália" id="tipo2">
                                <label class="form-check-label" for="tipo2">
                                    <h5 class="card-title">Sandália</h5>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($cat>=2){?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/ortopedico.jpg" class="card-img-top cardimgcenter" alt="...">
                        <div class="card-body">
                            <div class="form-check form-check-reverse">
                                <input class="form-check-input" type="radio" name="tipo" value="Chinelo Ortopédico" id="tipo3">
                                <label class="form-check-label" for="tipo3">
                                    <h5 class="card-title">Chinelo Ortopédico</h5>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <input type="hidden" name="id_utilizador" value="<?php echo $_SESSION['user_id'];?>">
            <p class="lead" style="text-align:center">
                <button id="addbotabtn" style="text-align:center" type="button" class="btn btn-primary">Pedir calçado</button>
            </p>
        </div>
    </div>
</div>