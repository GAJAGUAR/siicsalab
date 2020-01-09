<template>
  <button
    class="btn"
    :class="btnStyle"
    :data-dismiss="btnDismiss"
    :data-target="btnTarget"
    :data-toggle="btnToggle"
    :form="btnForm"
    :id="btnId"
    :type="btnType"
  >
    {{ btnCaption }}
  </button>
</template>

<script>
  export default {
    props: {
      btnCaption: {
        type: String,
        required: true
      },
      btnDismiss: {
        type: String,
        required: false
      },
      btnForm: {
        type: String,
        required: false
      },
      btnId: {
        type: String,
        required: true
      },
      btnStyle: {
        type: Array,
        required: false,
        default: function () {
          return [ 'btn-primary' ];
        }
      },
      btnTarget: {
        type: String,
        required: false
      },
      btnToggle: {
        type: String,
        required: false
      },
      btnType: {
        type: String,
        required: false,
        default: function () {
          return 'button'
        }
      }
    }
  };
</script>
