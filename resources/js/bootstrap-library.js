/*!
 * Bootstrap
 * Open source toolkit for developing with HTML, CSS, and JS
 */

/**
 * Show 'welcome' modal window in home view
 */
const showHomeModal = () => {
  $('#home-modal').modal('show');
};

/**
 * Set the focus on the cancel buttons of confirmation modal windows
 */
const setFocusOnCancelButton = () => {
  $('button[data-autofocus="true"]:first').trigger("focus");
  $('button[data-autofocus="true"]:last').trigger("focus");
}

$('.modal').on('shown.bs.modal', setFocusOnCancelButton());

