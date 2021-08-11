$(function () {
    initTabela()
    $('.cpf-mask').mask('000.000.000-00');
    $('.crm-mask').mask('00000000000');
    $('.telefone-mask').mask(SPMaskBehavior, spOptions);
    setTimeout(function(){
        $('.remove-after-5').remove();
    },5000)
});

//---------------------mascara de telefone --------------------
var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };

function initTabela()
{
    let table =
        $('.table').DataTable({
        "stateSave": false,
        "lengthMenu": [[10, 50,100], [10, 50,100]],
        "processing": true,
        "order": [[0, "desc"]],
        "language": {"url": "/js/Portuguese-Brasil.json"},
        "responsive":true,
    });
}