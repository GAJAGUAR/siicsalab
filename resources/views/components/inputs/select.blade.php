<div class="form-group
            {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <select id="{{ $fieldName }}"
          class="custom-select
                 select2
                 {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
          name="{{ $fieldName }}"
          data-autofocus="{{ $autofocus ?? 'false' }}"
          aria-describedby="{{ $textHelp }}">
    {{ $slot }}
  </select>
  @if ($errors->has($fieldName))
    <span class="invalid-feedback"
          role="alert">
      {{ $errors->first($fieldName) }}
    </span>
  @else
    <small id="{{ $textHelp }}"
           class="form-text
                  text-muted">
      {{ $textDescription }}
    </small>
  @endif
</div>
