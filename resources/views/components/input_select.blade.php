<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <select
    class="custom-select select2 {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
    id="{{ $fieldName }}"
    name="{{ $fieldName }}"
    {{ isset($readonly) && $readonly ? 'readonly' : '' }}
    data-autofocus="{{ $autofocus ?? 'false' }}"
  >
    {{ $slot }}
  </select>

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
