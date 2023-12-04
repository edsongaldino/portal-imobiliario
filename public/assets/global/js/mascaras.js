// Input Masks
$('#cep_endereco').mask("99.999-999");
$('.cep').mask("99.999-999");
$('.cpf').mask("999.999.999-99");
$('.cnpj').mask("99.999.999-9999-99");
$('.data').mask('99/99/9999');
$('.telefone').mask('(99) 9999-9999?9');

$('.moeda').maskMoney({thousands: '.', decimal: ','});
$('.moeda2').maskMoney({thousands: '', decimal: '.'});

$('.phone').mask("(99) 99999999?9").live('focusout', function (event) {
    var target, phone, element;
    target = (event.currentTarget) ? event.currentTarget : event.srcElement;
    phone = target.value.replace(/\D/g, '');
    element = $(target);
    element.unmask();
    if(phone.length > 10) {
        element.mask("(99) 99999-999?9");
    } else {
        element.mask("(99) 9999-9999?9");
    }
});