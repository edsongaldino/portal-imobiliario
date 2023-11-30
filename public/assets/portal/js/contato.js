$(document).on('click', '.enviarFormulario', function (e) {
    e.preventDefault();
    var formData = $("#ContatoAnuncio").serialize();

    if ($("#nome").val() == "") {
        swal({title: "Ops", text: "O campo nome deve ser preenchido!", type: "warning"});
        $("#nome").focus();
        return false;
    }

    if ($("#email").val() == "") {
        swal({title: "Ops", text: "O campo email deve ser preenchido!", type: "warning"});
        $("#email").focus();
        return false;
    }

    if ($("#telefone").val() == "") {
        swal({title: "Ops", text: "O campo telefone deve ser preenchido!", type: "warning"});
        $("#telefone").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "/contato-anuncio",
        data: formData,
        dataType: "json",
        success: function() {
            swal({title: "OK", text: "O formulário foi enviado com sucesso!", type: "success"});
        },
        error: function() {
            swal({title: "OPS", text: "Erro ao enviar formulário!", type: "warning"});
        }
    });

});

$(document).on('click', '.contatoWhatsapp', function (e) {
    e.preventDefault();
    var formData = $("#ContatoWhatsapp").serialize();

    if ($("#Modalnome").val() == "") {
        swal({title: "Ops", text: "O campo nome deve ser preenchido!", type: "warning"});
        $("#nome").focus();
        return false;
    }

    if ($("#Modalemail").val() == "") {
        swal({title: "Ops", text: "O campo email deve ser preenchido!", type: "warning"});
        $("#email").focus();
        return false;
    }

    if ($("#Modaltelefone").val() == "") {
        swal({title: "Ops", text: "O campo telefone deve ser preenchido!", type: "warning"});
        $("#telefone").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "/contato-anuncio",
        data: formData,
        dataType: "json",
        success: function() {

            $("#myTabContent").css("display", "none");
            $("#ContatoAnuncio").css("display", "block");
            swal({title: "OK", text: "O formulário foi enviado com sucesso!", type: "success"});

        },
        error: function() {
            swal({title: "OPS", text: "Erro ao enviar formulário!", type: "warning"});
        }
    });

});
