<script type="text/JavaScript" src="js/add_linha.js"></script>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="display-5 text-center">Adicionar Linha</h4>
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
                <span class="input-group-text" id="nome">Designação</span>
                <input type="text" name="nome" class="form-control" aria-label="Designação" aria-describedby="nome">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="ccustos">Centro Custos</span>
                <input type="number" name="ccustos" class="form-control" aria-label="Centro de custos" aria-describedby="ccustos">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="io">Internal Order</span>
                <input type="number" name="io" class="form-control" aria-label="Iternal Order" aria-describedby="io">
            </div>
            <p class="lead" style="text-align:center">
                <button id="addlinhabtn" style="text-align:center" type="button" class="btn btn-primary">Adicionar linha</button>
            </p>
        </div>
    </div>
</div>