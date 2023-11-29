$(document).on('click', '.enviarFormulario', function (e) {
    e.preventDefault();
    var formData = $("#ContatoAnuncio").serialize();

    if ($("#nome").val() == "") {
        swal({title: "Ops", text: "O campo nome deve ser preenchido!", type: "error"});
        $("#nome").focus();
        return false;
    }

    if ($("#email").val() == "") {
        swal({title: "Ops", text: "O campo email deve ser preenchido!", type: "error"});
        $("#email").focus();
        return false;
    }

    if ($("#telefone").val() == "") {
        swal({title: "Ops", text: "O campo telefone deve ser preenchido!", type: "error"});
        $("#telefone").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "/contato-anuncio",
        data: formData,
        dataType: "json",
        success: function(data) {
            swal({title: "OK", text: "O formulário foi enviado com sucesso!", type: "success"});
        },
        error: function() {
            swal({title: "Ops", text: "Erro ao enviar formulário!", type: "error"});
        }
    });

});
