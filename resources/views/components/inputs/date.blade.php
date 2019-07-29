<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>

  <input type="date" class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}" id="{{ $fieldName }}"
         name="{{ $fieldName }}" aria-describedby="{{ $textHelp }}" value="{{ $value }}"
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
