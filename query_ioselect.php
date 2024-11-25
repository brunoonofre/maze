<?php    
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    sec_session_start();

    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
    
    if(isset($_POST['moe'])){
        $moe = filter_input(INPUT_POST, 'moe', FILTER_DEFAULT);
        $sqllinha = $mysqli->query("SELECT * FROM linhas WHERE moe = '".$moe."'");
    }else{
        $sqllinha = $mysqli->query("SELECT * FROM linhas");
    }
    
    $sqldepartamento = $mysqli->query("SELECT * FROM departamentos");

    if($tipo=='dpt'){
?>
<div class="input-group">
    <label class="input-group-text" for="departamento">Departamento</label>
    <select class="form-select" aria-label="Departamento" name="io" id="departamento">
        <option selected style='display:none;' value="">Escolhe um Departamento</option>
        <?php 
            while($rowdepartamento = $sqldepartamento->fetch_array()){
                $centro_custo = $rowdepartamento['centro_custo'];
                $nome = $rowdepartamento['nome'];
        ?>
        <option value="<?php echo $centro_custo;?>"><?php echo $nome;?></option>
        <?php } ?>
    </select>
</div>
<?php }else if($tipo=="cns" || $tipo=="mfe"){ ?>
<div class="input-group">
    <label class="input-group-text" for="linha">Linha</label>
    <select class="form-select" aria-label="Linha" name="io" id="linha">
        <option selected style='display:none;' value="">Escolhe uma Linha</option>
        <?php 
            while($rowlinha = $sqllinha->fetch_array()){
                if($tipo=='cns'){
                    $io = $rowlinha['io_consumo'];
                }else if($tipo=='mfe'){
                    $io = $rowlinha['io_mfe'];
                }
                $nome = $rowlinha['nome'];
        ?>
        <option value="<?php echo $io;?>"><?php echo $nome;?></option>
        <?php } ?>
    </select>
</div>
<?php }else if($tipo=='moe'){?>
<script type="text/JavaScript">
$(function(){
    $("#manutselect").hide();

    $("select[name=linha]").on('change',function(){
        var equip = $('select[name=linha]').val();
        var id_linha = $(this).children(":selected").attr("id");
        $('input[name=id_linha]').attr("value", id_linha);
        if(equip.indexOf("equip")>=0){
            $("#manutselect").show();
            $("#equipamentos").empty();
            $('input[name=manut]').prop('checked', false);
        }else{
            $("#manutselect").hide();
            $("#equipamentos").empty();
            $('input[name=manut]').prop('checked', false);
        }
    });
    
    $("input[name=manut]").on('change',function(){
        var manut = $('input[name=manut]:checked').val();
        var id_linha = $('input[name=id_linha]').val();
        $("#equipamentos").load("query_equipamentos.php", {'id_linha': id_linha, 'manut': manut});
    });

});
</script>
<div class="input-group">
    <label class="input-group-text" for="linha">Linha</label>
    <select class="form-select" aria-label="Linha" name="linha" id="linha">
        <option selected style='display:none;' value="">Escolhe uma Linha</option>
        <?php 
            while($rowlinha = $sqllinha->fetch_array()){
                $id_linha = $rowlinha['id_linha'];
                $io = $rowlinha['io_moe'];
                $equipamentos = $rowlinha['equipamentos'];
                $nome = $rowlinha['nome'];
                
        ?>
        <option id="<?php echo $id_linha;?>" value="<?php if($equipamentos==1){echo 'equip'.$io;}else{echo $io;}?>"><?php echo $nome;?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="id_linha">
</div>
<div id="manutselect">
    <div class="input-group">
        <input type="radio" class="btn-check" name="manut" id="manut1" autocomplete="off" value="corr">
        <label class="btn btn-outline-primary admissao" for="manut1">Correctiva</label>

        <input type="radio" class="btn-check" name="manut" id="manut2" autocomplete="off" value="prev">
        <label class="btn btn-outline-primary" for="manut2">Preventiva</label>
    </div>
    <div id="equipamentos"></div>
</div>
<?php }?>