$(function(){
   
    var errordiv = $("#errordiv");
    var error = $("#error");
    var successdiv = $("#successdiv");
    var success = $("#success");
    const button = $("#saidabtn");
    const outmodal = $('#outmodal');
    const addoutbtn = $('#addoutbtn');
    const sairbtn = $('#sairbtn');
    
    errordiv.hide();
    successdiv.hide();
    $("#vsselect").hide();
    $('input[name=utilizador]').focus();
    window.scrollTo(0, 1);

    $("input[name=tipo]").on('change',function(){
        var tipo = $('input[name=tipo]:checked').val();
        if(tipo=='dpt'){
            $("#ioselect").load("query_ioselect.php", {'tipo': tipo});
            $("#vsselect").hide();
            $('input[name=vs]').prop('checked', false);
        }else{
            $("#vsselect").show();
            $("#ioselect").empty();
        }
    });
    
    $("input[name=vs]").on('change',function(){
        var tipo = $('input[name=tipo]:checked').val();
        var vs = $('input[name=vs]:checked').val();
        $("#ioselect").load("query_ioselect.php", {'tipo': tipo, 'vs': vs});
    })

    $("input[name=utilizador]").on('input', function(){
        $('input[name=pn]').focus();
    });

    $("input[name=pn]").on('input', function(){
        $('input[name=qty]').focus();
    });
    
    $("input").keypress(function(event){
        if(event.which==13){
            button.click();
        } 
        
    });

    addoutbtn.click(function(){
        $("#ioselect").empty();
        $('input[name=tipo]').prop('checked', false);
        $('input[name=pn]').val('');
        $('input[name=qty]').val('');
        $("#vsselect").hide();
        $('input[name=vs]').prop('checked', false);
        outmodal.modal('hide');
        $('input[name=pn]').focus();
    });
    
    sairbtn.click(function(){
        $("#ioselect").empty();
        $('input[name=tipo]').prop('checked', false);
        $('input[name=utilizador]').val('');
        $('input[name=pn]').val('');
        $('input[name=qty]').val('');
        $("#vsselect").hide();
        $('input[name=vs]').prop('checked', false);
        outmodal.modal('hide');
        $('input[name=utilizador]').focus();
    });
    
    button.click(function(){

        var tipo = $('input[name=tipo]:checked').val();

        if(tipo=='mfe' || tipo=='cns' || tipo=='dpt'){
            iofinal = $('select[name=io]').val();
        }else if(tipo=='moe'){
            var iolinha = $('select[name=linha]').val();
            var ioequip = $('select[name=equip_io]').val();
            if(ioequip=="" || ioequip==null){
                if(iolinha.indexOf("equip")>=0){
                    iofinal = "";
                }else{
                    iofinal = iolinha;
                }
            }else{
                iofinal = ioequip;
            }
            
        }else if(tipo==null){
            iofinal = "";
        }
        
        if($('input[name=uilizador]').val() == '' ||$('input[name=pn]').val() == '' ||$('input[name=qty]').val() == '' ||iofinal == ''){
            successdiv.slideUp();
            errordiv.slideDown();
            error.html("Deve preencher todos os campos!");
            return false;
        }else{

            var utilizador = $('input[name=utilizador]').val();
            var pn = $('input[name=pn]').val();
            var qty = $('input[name=qty]').val();
            
            post_data = {
                'utilizador': utilizador,
                'pn': pn,
                'qty': qty,
                'io': iofinal
            };
            
            $.ajax({
                type: 'post',
                url: 'includes/add_saida.php',
                data: post_data,
                dataType: 'json',
                error: function(xhr, ajaxOptions, thrownError){
                    alert("Error:\n" + thrownError);
                },
                success: function(response){
                    if(response.success == false){
                        successdiv.slideUp();
                        errordiv.slideDown();
                        error.html(response.text);
                    }else{
                        errordiv.slideUp();
                        outmodal.modal('show');
                    }
                }
            });
            
        }
        
    });
    
});