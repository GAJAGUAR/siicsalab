<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <input
    autocomplete="off"
    class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
    id="{{ $fieldName }}"
    maxlength="{{ $maxLength }}"
    name="{{ $fieldName }}"
    {{ isset($readonly) && $readonly ? 'readonly' : '' }}
    type="text"
    value="{{ $value }}"
    aria-describedby="{{ $textHelp }}"
    data-autofocus="{{ $autofocus ?? 'false' }}"
  >

  @if ($errors->has($fieldName))
    <span
      class="invalid-feedback"
      role="alert"
    >
      {{ $errors->first($fieldName) }}
    </span>
  @else
    <small
      id="{{ $textHelp }}"
      class="form-text text-muted"
    >
      {{ $textDescription }}
    </small>
  @endif
</div>
