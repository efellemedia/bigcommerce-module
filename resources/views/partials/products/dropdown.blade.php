<select name="attribute[{{ $modifier->id }}]" class="form-select">
    @foreach ($modifier->values as $value)
        <option value="{{ $value->id }}">{{ $value->label }}</option>
    @endforeach
</select>