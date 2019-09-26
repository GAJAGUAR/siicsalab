<div class="form-group
            {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <input class="form-control
                {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
         autocomplete="off"
         list="{{ $fieldName }}"
         maxlength="{{ $maxLength }}"
         name="{{ $fieldName }}"
         {{ $readonly ?? '' }}
         type="list"
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
           class="form-text
                  text-muted">
      {{ $textDescription }}
    </small>
  @endif
</div>
