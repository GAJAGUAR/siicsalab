<div class="form-group
            {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>

  <textarea id="{{ $fieldName }}"
            class="form-control
                   {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
            autocomplete="off"
            name="{{ $fieldName }}"
            maxlength="{{ $maxLength }}"
            {{ $readonly ?? '' }}
            rows="5" 
            data-autofocus="{{ $autofocus ?? 'false' }}"
            aria-describedby="{{ $textHelp }}">{{ $value }}</textarea>

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
