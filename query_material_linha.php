<?php    
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    sec_session_start();

    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_SANITIZE_NUMBER_INT);
    
    $sqlmaterial = $mysqli->query("SELECT i.id_material as id_material,
        m.part_number as part_number,
        m.descricao as descricao 
        FROM material_linha i 
        INNER JOIN materiais m
        ON m.id_material = i.id_material
        WHERE i.id_linha=$id_linha AND setup = 0");

    $sqlsetup = $mysqli->query("SELECT i.id_material as id_material,
        m.part_number as part_number,
        m.descricao as descricao 
        FROM material_linha i 
        INNER JOIN materiais m
        ON m.id_material = i.id_material
        WHERE i.id_linha=$id_linha AND setup = 1"); ?>
<blockquote class="blockquote">
    <p>Material Consumivel</p>
</blockquote>  
<?php
    while($rowmaterial = $sqlmaterial->fetch_array()){
        $id_material = $rowmaterial['id_material'];
        $pn = $rowmaterial['part_number'];
        $descricao = $rowmaterial['descricao'];
?>
    <div class="input-group">
        <div class="input-group-text">
            <input class="form-check-input" type="checkbox" value="<?php echo $id_material?>" aria-label="checkbox">
        </div>
        <input value="<?php echo $pn;?>" aria-label="pn" class="form-control" disabled>
        <input value="<?php echo $descricao;?>" aria-label="descricao" class="form-control" disabled>
        <input id="<?php echo $id_material;?>" type="number" aria-label="quantidade" class="form-control">
    </div>
<?php } ?>
<blockquote class="blockquote">
    <p>Material de Setup</p>
</blockquote>  
<?php
    while($rowsetup = $sqlsetup->fetch_array()){
        $id_material = $rowsetup['id_material'];
        $pn = $rowsetup['part_number'];
        $descricao = $rowsetup['descricao'];
    ?>
    <div class="input-group">
        <div class="input-group-text">
            <input class="form-check-input" type="checkbox" value="<?php echo $id_material?>" aria-label="checkbox">
        </div>
        <input value="<?php echo $pn;?>" aria-label="pn" class="form-control" disabled>
        <input value="<?php echo $descricao;?>" aria-label="descricao" class="form-control" disabled>
        <input id="<?php echo $id_material;?>" type="number" aria-label="quantidade" class="form-control">
    </div>
<?php } ?>