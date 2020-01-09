<template>
  <div class="form-group" :class="style">
    <label :for="fieldName">
      {{ label }}
    </label>
    <input
      autocomplete="off"
      class="form-control" :class="{ 'is-invalid': hasError }"
      :id="fieldName"
      :max="max"
      :min="min"
      :name="fieldName"
      :readonly="isReadonly"
      :step="step"
      :type="type"
      :value="value"
      :aria-describedby="ariaCaption"
      :data-autofocus="isAutofocus"
    >
    <span v-if="hasError"
      class="invalid-feedback"
      role="alert"
    >
      {{ errorCaption }}
    </span>
    <small
      v-else
      :id="ariaCaption"
      class="form-text text-muted"
    >
      {{ description }}
    </small>
  </div>
</template>

<script>
export default {
  props: {
    ariaCaption: {
      type: String,
      required: false
    },
    description: {
      type: String,
      required: false
    },
    errorCaption: {
      type: String,
      required: true
    },
    fieldName: {
      type: String,
      required: true
    },
    hasError: {
      type: Boolean,
      required: false,
      default: function() {
        return false;
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
    style: {
      type: Array,
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
  }
};
</script>
