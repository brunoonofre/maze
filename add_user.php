<script type="text/JavaScript" src="js/add_user.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Adicionar Utilizador</h4>
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
                <input type="text" name="nome" class="form-control" aria-label="Nome" aria-describedby="nome">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="utilizador">Utilizador</span>
                <input type="text" name="utilizador" class="form-control" aria-label="Utilizador" aria-describedby="utilizador">
            </div>
            <div class="input-group">
                <span class="input-group-text" for="categoria">Categoria</span>
                <select class="form-select" aria-label="Categoria" name="estatuto" id="estatuto">
                    <option selected value="" style='display:none;'>Escolhe a categoria</option>
                    <option value="3">Administrador</option>
                    <option value="2">Line-Leader</option>
                    <option value="1">POUP</option>
                </select>
            </div>
            <p class="lead" style="text-align:center">
                <button id="adduserbtn" style="text-align:center" type="button" class="btn btn-primary">Adicionar utilizador</button>
            </p>
        </div>
    </div>
</div>