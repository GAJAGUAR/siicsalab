// plugins initialization
$(document).ready(function () {
  $('#table-primary').DataTable({
    "language": {
      "decimal": ",",
      "thousands": " ",
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "Ningún registro encontrado",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Ningún registro disponible",
      "infoFiltered": "(filtrados de _MAX_ totales)",
      "search": "Búsqueda:",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "Todos"]
    ]
  });

  $('.select2').select2({
    theme: "bootstrap"
  });

  //Autofocus
  $('input:first').focus();

  $('textarea:first').focus();

  $('.nav .nav-link:first').focus();
});

// home modal
$(document).ready(function () {
  $('#home-modal').modal('show');
});

$('#home-modal').on('shown.bs.modal', function () {
  $('.close').trigger('focus')
})

//Modal autofocus
$('#new-modal').on('shown.bs.modal', function () {
  $('#btn-cancel-new').trigger('focus')
});

$('#exit-modal').on('shown.bs.modal', function () {
  $('#btn-cancel-exit').trigger('focus')
});

$('#save-modal').on('shown.bs.modal', function () {
  $('#btn-cancel-save').trigger('focus')
});

$('#delete-modal').on('shown.bs.modal', function () {
  $('#btn-cancel-delete').trigger('focus')
});
