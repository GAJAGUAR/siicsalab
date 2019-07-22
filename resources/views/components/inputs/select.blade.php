<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>


  <select class="custom-select {{ $errors->has($fieldName) ? ' is-invalid' : '' }}" id="{{ $fieldName }}" name="{{ $fieldName }}" aria-describedby="{{ $textHelp }}">
    <option>Seleccionar</option>
    
    {{ $slot }}
  </select>

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
