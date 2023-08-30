"use strict";
var KTSigninGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        email: { validators: { notEmpty: { message: "É necessário um endereço de e-mail" }, emailAddress: { message: "O valor não é um endereço de e-mail válido" } } },
                        password: { validators: { notEmpty: { message: "A senha é necessária" } } }
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row" }) },
                })),
                e.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" == i
                                ? (e.setAttribute("data-kt-indicator", "on"),
                                  (e.disabled = !0),
                                  setTimeout(function () {
                                      e.removeAttribute("data-kt-indicator"),
                                          (e.disabled = !1),
                                            $.ajax({
                                                url: $('#kt_sign_in_form').attr('action'),
                                                type: 'POST',
                                                data : $('#kt_sign_in_form').serialize(),
                                                success: function(result) {
                                                    if(result == 'Sucesso'){
                                                        window.location='/dashboard'
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
                                  }, 2e3))
                                : Swal.fire({
                                      text: "Desculpe, parece que alguns erros foram detectados, tente novamente.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "OK, entendi!",
                                      customClass: { confirmButton: "btn btn-primary" },
                                  });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
