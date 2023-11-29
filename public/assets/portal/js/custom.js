$(document).on('click', '.enviarContato', function (e) {
    $.ajax({
    url: $('#ContatoAnuncio').attr('action'),
    type: 'POST',
    data : $('#ContatoAnuncio').serialize(),
    success: function(result) {
        if(result == 'Sucesso'){
            Swal.fire({
                text: "Dados enviados com sucesso. Aguarde que entraremos em contato!",
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "OK!",
                customClass: { confirmButton: "btn btn-primary" },
            });
        }else{
            Swal.fire({
                text: "Ops, não foi possível logar com essas informações!",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK, entendi!",
                customClass: { confirmButton: "btn btn-primary" },
            });
        }

    }
  });
});

$(document).on('click', '.btnTransacao', function (e) {
    e.preventDefault();
    var transacao = $(this).data('transacao');
    $('#transacao').val(transacao);
});

$(document).on('click', '.ImovelIntegrado', function (e) {
    swal({title: "Ops", text: "Não é possível editar ou excluir anúncios integrados via api!", type: "info"});
});


