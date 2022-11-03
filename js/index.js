var cepOptions =  {
    onComplete: function(cep) {
        encontrarCep(cep);
        desabilitaCamposDeEndereco();
    },
    onKeyPress: function(cep, event, currentField, options){
        console.log('A key was pressed!:', cep, ' event: ', event,
                    'currentField: ', currentField, ' options: ', options);
    },
    onChange: function(cep){
        console.log('cep changed! ', cep);
    },
    onInvalid: function(val, e, f, invalid, options){
        var error = invalid[0];
        console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
    }
};

var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

function encontrarCep(cep)
{
        if(cep)
        {
            var url = "https://viacep.com.br/ws/"+cep+"/json/"
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: url,
                async: true,
                success: function(response) {
                    $("#bairro").val(response.bairro);
                    $("#endereco").val(response.logradouro);
                    $("#cidade").val(response.localidade);
                    $("#uf").val(response.uf);
                    if($("#endereco").val())
                    {
                        $("#numero").focus();
                    }
                },
                complete: function(){
                    habilitaCamposDeEndereco();
                }
            });
        }else{
            alert("digite um cep válido");
        }
}

function desabilitaCamposDeEndereco()
{
    $(".endereco").prop("readonly", true);
}

function habilitaCamposDeEndereco()
{
    $(".endereco").prop("readonly", false);
}

$(document).ready(function() {

    $('#cep').mask('00000-000', cepOptions);
    $('#telefone').mask(SPMaskBehavior, spOptions);

    $("#email").focusout(function() {
        var field_value = $(this).val();
        var local_email = Cookies.get('email');
        if(local_email && local_email == field_value)
        {
            alert('Esse e-mail já este em uso em nossa base de dados, para continuar é necessário digitar um outro e-mail?');
            $(this).val('');
            $(this).focus();
        }
    });
});