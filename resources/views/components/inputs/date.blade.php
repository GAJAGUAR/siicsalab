<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <input id="{{ $fieldName }}"
         class="form-control text-uppercase {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
         autocomplete="off"
         name="{{ $fieldName }}"
         type="date"
         {{ isset($readonly) && $readonly ? 'readonly' : '' }}
         value="{{ $value }}"
         data-autofocus="{{ $autofocus ?? 'false' }}"
         aria-describedby="{{ $textHelp }}">

  @if ($errors->has($fieldName))
    <span class="invalid-feedback"
          role="alert">
      {{ $errors->first($fieldName) }}
    </span>
  @else
    <small id="{{ $textHelp }}"
           class="form-text text-muted">
      {{ $textDescription }}
    </small>
  @endif
</div>
