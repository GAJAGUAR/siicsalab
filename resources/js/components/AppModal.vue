<template>
  <div
    class="modal fade"
    role="dialog"
    tabindex="-1"
    aria-labelledby="modal"
    aria-hidden="true"
    :id="modalId"
    @focus="focusOnCancel"
  >
    <div
      class="modal-dialog modal-dialog-centered"
      role="document"
    >
      <div class="modal-content">
        <div class="modal-header">
          <h5
            id="modalTitle"
            class="modal-title text-capitalize"
          >
            {{ modalTitle }}
          </h5>
          <button
            class="close"
            id="btn-close"
            type="button"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ modalMessage }}
        </div>
        <div class="modal-footer">
          <app-button
            btn-caption="Cancelar"
            btn-dismiss="modal"
            btn-id="btn-cancel"
            btn-style="btn-outline-primary"
          />
          <app-button
            btn-caption="Aceptar y salir"
            btn-form="form"
            btn-id="btn-quit"
            btn-style="btn-primary"
            btn-type="submit"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import AppButton from "./AppButton";

  export default {
    components: {AppButton},
    props: {
      modalId: {
        type: String,
        required: true
      },
      modalMessage: {
        type: String,
        required: true
      },
      modalTitle: {
        type: String,
        required: true
      }
    },
    methods: {
      focusOnCancel: function () {
        $('#btn-cancel').trigger('focus');
      }
    }
  };
</script>
