<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>

  <textarea rows="5" class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }} autofocus"
            id="{{ $fieldName }}" name="{{ $fieldName }}" aria-describedby="{{ $textHelp }}"
            maxlength="{{ $maxLength }}" autocomplete="off" {{ $readonly ?? '' }}>{{ $value }}</textarea>

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
