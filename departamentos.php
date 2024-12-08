<?php

    if($cat == 3){
        $sql = $mysqli->query("SELECT * FROM departamentos");
    }else{
        header('Location: ../maze');
    }

?>
<script type="text/JavaScript" src="js/departamentos.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Departamentos</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-10 col-md-10">
            <p class="lead"><a href="adddepartamento"><button type="button" class="btn btn-primary">Adicionar Departamento</button></a></p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Centro de custo</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php 
                    while($rowdepartamento = $sql->fetch_array()){
                        $id_departamento = $rowdepartamento['id_departamento'];
                        $nome = $rowdepartamento['nome'];
                        $ccusto = $rowdepartamento['centro_custo'];
                ?>
                    <tr>
                        <td id="<?php echo $id_departamento;?>"><?php echo $nome;?></td>
                        <td id="<?php echo $id_departamento;?>"><?php echo $ccusto;?></td>
                        <td class="edit">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_departamento; ?>" 
                                    class="bi bi-pencil edit"></span>
                        </td>
                        <td class="delete">
                            <span style="cursor: pointer;"
                                    id="<?php echo $id_departamento; ?>" 
                                    class="bi bi-trash delete"></span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
