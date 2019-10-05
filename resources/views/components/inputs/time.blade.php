<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>

  <input id="{{ $fieldName }}"
         class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
         type="time"  
         name="{{ $fieldName }}" aria-describedby="{{ $textHelp }}"
         {{ isset($readonly) && $readonly ? 'readonly' : '' }}
         value="{{ $value }}"
         data-autofocus="{{ $autofocus ?? 'false' }}"
         autocomplete="off">

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
