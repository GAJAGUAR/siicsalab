<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <textarea
    autocomplete="off"
    class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
    id="{{ $fieldName }}"
    maxlength="{{ $maxLength }}"
    name="{{ $fieldName }}"
    {{ isset($readonly) && $readonly ? 'readonly' : '' }}
    rows="5"
    aria-describedby="{{ $textHelp }}"
    data-autofocus="{{ $autofocus ?? 'false' }}"
  >{{ $value }}</textarea>

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
