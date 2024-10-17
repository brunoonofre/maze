$(function(){

    $("td:not(.delete)").click(function(){
        var id_bata = this.id;
        var url = 'bataview';
        var form = $('<form action="' + url + '" method="post"><input type="hidden" name="id_bata" value="' + id_bata + '" /></form>');
        $('body').append(form);
        form.submit();
    });

});