$(function(){

    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    
    errordiv.hide();
    successdiv.hide();
    
    $("td").click(function(){

        var id = this.id;
        $("#modalcontent").load("modal_pedidos.php", {'id': id});
        $('#sapoutput').modal('toggle');
    });
    

});