<script type="text/JavaScript" src="js/add_material.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Adicionar Material</h4>
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
                <span class="input-group-text" id="pn">Part Number</span>
                <input type="text" name="pn" class="form-control" aria-label="Part Number" aria-describedby="pn">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="descricao">Descrição</span>
                <input type="text" name="descricao" class="form-control" aria-label="Descrição" aria-describedby="descricao">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="localizacao">Localização</span>
                <input type="text" name="localizacao" class="form-control" aria-label="Localização" aria-describedby="localizacao">
            </div>
            <p class="lead" style="text-align:center">
                <button id="addmatbtn" style="text-align:center" type="button" class="btn btn-primary">Adicionar material</button>
            </p>
        </div>
    </div>
</div>