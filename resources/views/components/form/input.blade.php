<div class="mb-4">
    <label for="{{$name}}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}"
        @class(['form-control',
            'is-valid' => old($name) && !$errors->has($name),
            'is-invalid' => $errors->has($name)]) id={{$name}} name={{$name}} value="{{ $value }}">
    @error($name) <span class="text-danger">{{ $message }}</span> @enderror
</div>
