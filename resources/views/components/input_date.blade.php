<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <input
    autocomplete="off"
    class="form-control text-uppercase {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
    id="{{ $fieldName }}"
    name="{{ $fieldName }}"
    {{ isset($readonly) && $readonly ? 'readonly' : '' }}
    type="date"
    value="{{ $value }}"
    data-autofocus="{{ $autofocus ?? 'false' }}"
  />

  @if ($errors->has($fieldName))
    <span
      class="invalid-feedback"
      role="alert"
    >
      {{ $errors->first($fieldName) }}
    </span>
  @else
    <small
      class="form-text text-muted"
    >
      {{ $textDescription }}
    </small>
  @endif
</div>
