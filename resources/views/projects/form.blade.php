<!-- filepath: /c:/Users/analista.desarrollo/Downloads/testProject/testProject/resources/views/projects/form.blade.php -->
@csrf
<div>
    <label for="category_id" class="form-label mt-3 mb-3 fs-4 fw-bold">
        Categoría <br> 
    </label>
    <select 
    name="category_id" 
    id="category_id"
    class="form-select">
        <option value="">Seleccione una categoría</option>
        @foreach ($categories as $id => $name)
            <option value="{{ $id }}" {{ $id == old('category_id', $project->category_id) ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>
<label class="form-label mt-3 mb-3 fs-4 fw-bold">
    Título del proyecto <br>
    <input type="text" name="tittle" value="{{ old('tittle', $project->tittle) }}" class="form-control">
</label>
<br>
<label class="form-label mt-3 mb-3 fs-4 fw-bold">
    Descripción <br>
    <textarea name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
</label>
<div class="custom-file mt-3 mb-3">
    <input type="file" class="custom-file-input" id="customFile" name="image">
    <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->tittle }}" class="img-thumbnail mt-2" style="width: 150px;">
    @endif
</div>
<br>