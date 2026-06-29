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

function atualizarContagemCidades() {
    var transacao = $('#transacao').val() || 'Venda';
    var tipos = $('#tipo_imovel').val() || [];

    $.ajax({
        url: '/api/cidades-contagem',
        type: 'GET',
        data: {
            transacao: transacao,
            tipos: tipos
        },
        success: function(response) {
            $('#localizacao option').each(function() {
                var cidadeId = $(this).val();
                if (cidadeId) {
                    var text = $(this).text();
                    var nomeEstado = text.substring(0, text.indexOf('('));
                    var total = response[cidadeId] ? response[cidadeId] : 0;
                    $(this).text(nomeEstado.trim() + ' (' + total + ')');
                }
            });
            $('#localizacao').selectpicker('refresh');
        }
    });
}

$(document).on('click', '.btnTransacao', function (e) {
    e.preventDefault();
    var transacao = $(this).data('transacao');
    $('#transacao').val(transacao);
    // Toggle active on hero tab buttons
    $('.hero-tab-btn').removeClass('active');
    if ($(this).hasClass('hero-tab-btn')) {
        $(this).addClass('active');
    }
    atualizarContagemCidades();
});

$(document).on('change', '#tipo_imovel', function (e) {
    atualizarContagemCidades();
});

var timerContagemFiltros = null;
function atualizarBotaoContagemCompleta() {
    clearTimeout(timerContagemFiltros);
    timerContagemFiltros = setTimeout(function() {
        var form = $('#FormBuscaCompleta');
        if (form.length > 0) {
            $.ajax({
                url: '/api/imoveis-contagem',
                type: 'GET',
                data: form.serialize(),
                success: function(response) {
                    if (response && response.total !== undefined) {
                        $('#btnSubmitFiltros').text('Buscar ' + response.total + ' imóveis');
                    }
                }
            });
        }
    }, 250);
}

$(document).on('change keyup click input', '#FormBuscaCompleta input, #FormBuscaCompleta select, .custom-control-input, .custom-checkbox', function (e) {
    atualizarBotaoContagemCompleta();
});

$(document).on('click', '.ImovelIntegrado', function (e) {
    swal({title: "Ops", text: "Não é possível editar ou excluir anúncios integrados via api!", type: "info"});
});


