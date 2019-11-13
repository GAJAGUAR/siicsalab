<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <input
    autocomplete="off"
    class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
    list="{{ $fieldName }}"
    maxlength="{{ $maxLength }}"
    name="{{ $fieldName }}"
    {{ isset($readonly) && $readonly ? 'readonly' : '' }}
    type="list"
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
      class="form-text text-muted"
      id="{{ $textHelp }}"
    >
      {{ $textDescription }}
    </small>
  @endif
</div>
