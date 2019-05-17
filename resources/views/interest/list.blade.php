<div class="form-check">
  <input class="form-check-input" name="checkbox[]" type="checkbox"  value="{{ $checkbox->id }}" id="{{ $checkbox->id }}">
  <label class="form-check-label" for="{{ $checkbox->id }}">
    {{ $checkbox->field }}
  </label>
</div>