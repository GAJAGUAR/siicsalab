<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>
  <input id="{{ $fieldName }}"
         class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
         autocomplete="off"
         name="{{ $fieldName }}"
         value="{{ $value }}"
         type="date"  
         aria-describedby="{{ $textHelp }}" 
         {{ $readonly ?? '' }}>
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
