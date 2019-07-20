// data tables initialization
$(document).ready(function () {
  $('#table-primary').DataTable();
});

// home modal
$(document).ready(function () {
  $('#home-modal').modal('show');
});

$('#home-modal').on('shown.bs.modal', function () {
  $('.close').trigger('focus')
})

//Autofocus
$(document).ready(function () {
  $('input:first').focus();
});

$(document).ready(function () {
  $('textarea:first').focus();
});

$(document).ready(function () {
  $('.nav .nav-link:first').focus();
});

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
