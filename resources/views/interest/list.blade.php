<div class="form-check">
  <input class="form-check-input {{ $errors->has('checkbox') ? 'is-invalid' : '' }}" name="checkbox[]" type="checkbox"  value="{{ $checkbox->id }}" id="{{ $checkbox->id }}">
  <label class="form-check-label" for="{{ $checkbox->id }}">
    <b>{{ $checkbox->field }}</b>
  </label>
</div>