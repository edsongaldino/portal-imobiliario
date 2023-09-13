"use strict";
var KTPasswordResetNewPassword = (function () {
    var e,
        t,
        r,
        o,
        s = function () {
            return 100 === o.getScore();
        };
    return {
        init: function () {
            (e = document.querySelector("#kt_new_password_form")),
                (t = document.querySelector("#kt_new_password_submit")),
                (o = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]'))),
                (r = FormValidation.formValidation(e, {
                    fields: {
                        password: {
                            validators: {
                                notEmpty: { message: "A senha é obrigatória" },
                                callback: {
                                    message: "Por favor insira uma senha válida",
                                    callback: function (e) {
                                        if (e.value.length > 0) return s();
                                    },
                                },
                            },
                        },
                        "confirm-password": {
                            validators: {
                                notEmpty: { message: "A confirmação da senha é necessária" },
                                identical: {
                                    compare: function () {
                                        return e.querySelector('[name="password"]').value;
                                    },
                                    message: "A senha e sua confirmação não são iguais",
                                },
                            },
                        }
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger({ event: { password: !1 } }), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                })),
                t.addEventListener("click", function (s) {
                    s.preventDefault(),
                        r.revalidateField("password"),
                        r.validate().then(function (r) {
                            "Valid" == r
                                ? (t.setAttribute("data-kt-indicator", "on"),
                                  (t.disabled = !0),
                                  setTimeout(function () {
                                      t.removeAttribute("data-kt-indicator"),
                                          (t.disabled = !1),
                                            $.ajax({
                                                url: $('#kt_new_password_form').attr('action'),
                                                type: 'POST',
                                                data : $('#kt_new_password_form').serialize(),
                                                success: function(result) {
                                                    if(result == 'Sucesso'){
                                                        window.location='/dashboard'
                                                    }else{
                                                        Swal.fire({
                                                            text: "Ops, não foi possível alterar sua senha!",
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
                                      text: "Desculpe, parece que foram detectados alguns erros. Tente novamente.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: { confirmButton: "btn btn-primary" },
                                  });
                        });
                }),
                e.querySelector('input[name="password"]').addEventListener("input", function () {
                    this.value.length > 0 && r.updateFieldStatus("password", "NotValidated");
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTPasswordResetNewPassword.init();
});
