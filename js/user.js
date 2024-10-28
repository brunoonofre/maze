$(function(){

    var button = $("#edituserbtn");
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");

    errordiv.hide();
    successdiv.hide();

    button.click(function(){
        var id_utilizador = $('input[name=id_utilizador]').val();
        var url = 'edituser';
        var form = $('<form action="' + url + '" method="post"><input type="hidden" name="id_utilizador" value="' + id_utilizador + '" /></form>');
        $('body').append(form);
        form.submit();
    });


});