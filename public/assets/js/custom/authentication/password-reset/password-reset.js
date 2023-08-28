"use strict";
var KTPasswordResetGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_password_reset_form")),
                (e = document.querySelector("#kt_password_reset_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: { email: { validators: { notEmpty: { message: "Informe seu e-mail" }, emailAddress: { message: "Este e-mail não é válido!" } } } },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                })),
                e.addEventListener("click", function (o) {
                    o.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" == i
                                ? (e.setAttribute("data-kt-indicator", "on"),
                                  (e.disabled = !0),
                                  setTimeout(function () {
                                      e.removeAttribute("data-kt-indicator"),
                                          (e.disabled = !1),

                                          $.ajax({
                                            url: $('#kt_password_reset_form').attr('action'),
                                            type: 'POST',
                                            data : $('#kt_password_reset_form').serialize(),
                                            success: function(result) {
                                                if(result == 'Sucesso'){

                                                    Swal.fire({
                                                        text: "Enviamos um e-mail com as instruções para redefinir sua senha!",
                                                        icon: "success",
                                                        buttonsStyling: !1,
                                                        confirmButtonText: "OK!",
                                                        customClass: { confirmButton: "btn btn-primary" },
                                                    });

                                                    window.location='/login'
                                                }else{
                                                    Swal.fire({
                                                        text: "Ops, não foi possível encontrar um usuário com este e-mail!",
                                                        icon: "error",
                                                        buttonsStyling: !1,
                                                        confirmButtonText: "OK, entendi!",
                                                        customClass: { confirmButton: "btn btn-primary" },
                                                    });
                                                }

                                            }
                                          });

                                  }, 1500))
                                : Swal.fire({
                                      text: "Sorry, looks like there are some errors detected, please try again.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: { confirmButton: "btn btn-primary" },
                                  });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTPasswordResetGeneral.init();
});
