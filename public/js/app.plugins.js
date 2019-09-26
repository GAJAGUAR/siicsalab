/*!
 * SISLAB 
 * Plugins and complements
 */

/**
 * $bootstrap
 */

// home modal
const showHomeModal = () => {
  $("#home-modal").modal("show")
}

// autofocus on defaul modal button
$(".modal").on("shown.bs.modal", function() {
  $("button[data-autofocus='true']:first").trigger("focus")
  $("button[data-autofocus='true']:last").trigger("focus")
})

/**
 * $datatables
 */

// changing default settings
const datatablesInit = () => {
  $("#table-primary").DataTable({
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
    ],
    "order": [[0, "desc"]]
  })
}

// changing datatables DOM
const moddingDatatablesDom = () => {
  let tablePrimaryWrapper
  
  tablePrimaryWrapper = document.getElementById("table-primary_wrapper")
  
  // check if datatable plugin is active
  if (typeof(tablePrimaryWrapper) !== undefined && tablePrimaryWrapper !== null) {
    let dataTablesLenght
    let dataTablesFilter
    let labelSearch
    let inputSearch

    // change layout datatables lenght
    dataTablesLenght = document.getElementById("table-primary_length")
      .parentElement
    dataTablesFilter = document.getElementById("table-primary_filter")
      .parentElement

    dataTablesLenght.classList.remove("col-md-6")
    dataTablesLenght.classList.add("col-md-4")
    dataTablesLenght.classList.add("d-print-none")
    dataTablesFilter.classList.remove("col-md-6")
    dataTablesFilter.classList.add("col-md-8")

    // extract input element from label element
    labelSearch = dataTablesFilter.firstElementChild.firstElementChild
    inputSearch = labelSearch.firstElementChild
    labelSearch.remove()
    inputSearch.placeholder = "Filtro"
    inputSearch.setAttribute('data-autofocus', 'true')
    dataTablesFilter.firstElementChild.appendChild(inputSearch)

    // extend input element
    inputSearch.classList.add("w-80")
  }
}

/**
 * $select2
 */

// apply bootstrap theme
const select2Init =() => {
  $(".select2").select2({
    theme: "bootstrap"
  })
}

/**
 * $complements
 */

// autofocus
const setFocus = () => {
  $("*[data-autofocus='true']").focus()
}

/**
 * $initialization
 */

$(document).ready(function () {
  showHomeModal()
  datatablesInit()
  select2Init()
  moddingDatatablesDom()
  setFocus()
})
