<?php
    
    if($cat<3){
        header('Location: ../maze');
    }

    $id_equipamento = filter_input(INPUT_POST, 'id_equipamento', FILTER_DEFAULT);
    
    $sqllinhas = $mysqli->query("SELECT * FROM linhas WHERE equipamentos=1");
    
    $sqleditequip = $mysqli->query("SELECT * FROM equipamentos WHERE id_equipamento =".$id_equipamento);
    $roweditequip = $sqleditequip->fetch_array();

    $nome = $roweditequip['nome'];
    $linha = $roweditequip['id_linha'];
    $io_corr = $roweditequip['io_corr'];
    $io_prev = $roweditequip['io_prev'];

?>
<script type="text/JavaScript" src="js/edit_equipamento.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Editar Equipamento</h4>
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
                <label class="input-group-text" for="linha">Linha</label>
                <select class="form-select" aria-label="Linha" name="linha" id="linha">
                    <?php 
                        while($rowlinhas = $sqllinhas->fetch_array()){
                            $id_linha = $rowlinhas['id_linha'];
                            $nome = $rowlinhas['nome'];
                    ?>
                    <option value="<?php echo $id_linha.'"'; if($id_linha==$linha){echo 'selected';}?>><?php echo $nome;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_corr">Internal Order Correctiva</span>
                <input type="number" name="io_corr" value="<?php echo $io_corr;?>"  class="form-control" aria-label="Iternal Order Correctiva" aria-describedby="io_corr">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io_prev">Internal Order Preventiva</span>
                <input type="number" name="io_prev" value="<?php echo $io_prev;?>"  class="form-control" aria-label="Iternal Order Preventiva" aria-describedby="io_prev">
            </div>
            <input type="hidden" name="id_equipamento" value="<?php echo $id_equipamento;?>">
            <p class="lead" style="text-align:center">
                <button id="editequipbtn" style="text-align:center" type="button" class="btn btn-primary">Editar equipamento</button>
            </p>
        </div>
    </div>
</div>