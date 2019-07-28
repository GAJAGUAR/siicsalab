// plugins initialization
$(document).ready(function () {
  $('#table-primary').DataTable();

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
