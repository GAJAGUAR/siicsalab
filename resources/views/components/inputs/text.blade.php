<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>

  <input type="text" class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}" id="{{ $fieldName }}"
         name="{{ $fieldName }}" aria-describedby="{{ $textHelp }}" value="{{ $value }}" maxlength="{{ $maxLength }}"
         autocomplete="off" {{ $readonly ?? '' }}>

  @if ($errors->has($fieldName))
    <span class="invalid-feedback" role="alert">
      {{ $errors->first($fieldName) }}
    </span>
  @else
    <small id="{{ $textHelp }}" class="form-text text-muted">
      {{ $textDescription }}
    </small>
  @endif
</div>
