<template>
  <div class="form-group col-12 col-md">
    <label :for="field">
      {{ label }}
    </label>
    <input
      autocomplete="off"
      class="form-control"
      :aria-describedby="aria"
      :class="isValid"
      :data-autofocus="isAutofocus"
      :id="field"
      :max="max"
      :min="min"
      :name="field"
      :readonly="isReadonly"
      :step="step"
      :type="type"
      :value="value"
    >
    <small
      v-if="hasError == 'false'"
      class="form-text text-muted"
      :id="aria"
    >
      {{ description }}
    </small>
    <span
      v-else
      class="invalid-feedback"
      role="alert"
    >
      {{ error }}
    </span>
  </div>
</template>

<script>
export default {
  props: {
    aria: {
      type: String,
      required: false
    },
    description: {
      type: String,
      required: false
    },
    error: {
      type: String,
      required: true
    },
    field: {
      type: String,
      required: true
    },
    hasError: {
      type: String,
      required: false,
      default: function() {
        return 'false';
      }
    },
    isAutofocus: {
      type: Boolean,
      required: false,
      default: function() {
        return false;
      }
    },
    isReadonly: {
      type: Boolean,
      required: false,
      default: function() {
        return false;
      }
    },
    label: {
      type: String,
      required: true
    },
    max: {
      type: Number,
      required: false
    },
    min: {
      type: Number,
      required: false,
      default: function() {
        return 0;
      }
    },
    step: {
      type: Number,
      required: false
    },
    type: {
      type: String,
      required: true
    },
    value: {
      type: String,
      required: false
    }
  },
  computed: {
    isValid: function() {
      if (this.hasError == 'true') {
        return 'is-invalid';
      }
    }
  }
};
</script>
