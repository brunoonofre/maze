<?php    
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    sec_session_start();

    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_SANITIZE_NUMBER_INT);
    $manut = filter_input(INPUT_POST, 'manut', FILTER_DEFAULT);
    
    $sqlequipamentos = $mysqli->query("SELECT * FROM equipamentos WHERE id_linha = ".$id_linha);

?>
<div class="input-group">
    <label class="input-group-text" for="equipamento">Equipamento</label>
    <select class="form-select" aria-label="Equipamento" name="equip_io" id="equipamento">
        <option selected style='display:none;' value="">Escolhe um equipamento</option>
        <?php 
            while($rowequip = $sqlequipamentos->fetch_array()){
                $nome = $rowequip['nome'];
                if($manut=='corr'){
                    $io = $rowequip['io_corr'];
                }else if($manut=='prev'){
                    $io = $rowequip['io_prev'];
                }
                
        ?>
        <option value="<?php echo $io; ?>"><?php echo $nome.$io;?></option>
        <?php } ?>
    </select>
</div>