$(function () {
    initTabela()
    $('.cpf-mask').mask('000.000.000-00');
    $('.crm-mask').mask('00000000000');
    setTimeout(function(){
        $('.remove-after-5').remove();
    },5000)
});

function initTabela()
{
    let table =
    $('.table').DataTable({
    "stateSave": false,
    // "dom": '<"row"<"col-md-6"l><"col-md-6"p>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
    "lengthMenu": [[10, 50,100], [10, 50,100]],
    "processing": true,
    "order": [[0, "desc"]],
    "language": {"url": "/js/Portuguese-Brasil.json"},
    "responsive":true,
});

// let table =
// $('.table').DataTable({
// "stateSave": false,
// "dom": '<"row"<"col-md-6"l><"col-md-6"p>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
// "lengthMenu": [[10, 50,100], [10, 50,100]],
// "processing": true,
// //     "serverSide": true,
// //     "ajax": $.fn.dataTable.pipeline({
// //         url: urlPaginacao,
// //         pages: paginas, 
// //         method: metodo,
// // //            data: formData(),
// //         data: function (d) {
// //             d._token = $('meta[name="csrf-token"]').attr('content');
// //             d.pesquisa = pesquisar()
// //         }
// //     }),
// // "columns": col,
// // "columnDefs": columnDefs,
// "order": [[0, "desc"]],
// "language": {"url": "/js/Portuguese-Brasil.json"},
// // "fnRowCallback": function(nRow, aData) { fnRowCallback(nRow, aData);},
// "responsive":true,
// });
}