<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input id="name" name="name" type="text" class="form-control"
        value="{{ old('name', $category->name ?? '') }}">
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="is_publish" class="form-label">Publish</label>
    <select id="is_publish" name="is_publish" class="form-select">
        <option value="1" {{ old('is_publish', $category->is_publish ?? '') == 1 ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ old('is_publish', $category->is_publish ?? '') == 0 ? 'selected' : '' }}>No</option>
    </select>
    @error('is_publish') <div class="text-danger">{{ $message }}</div> @enderror
</div>
