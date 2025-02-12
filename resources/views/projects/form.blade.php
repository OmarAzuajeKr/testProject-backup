@csrf
<label class="form-label mt-3 mb-3 fs-4 fw-bold"> 
    Titulo del proyecto <br>
    <input type="text" name="tittle" value="{{ old('tittle', $project->tittle) }}">
</label>
<br>
<label class="form-label mt-3 mb-3 fs-4 fw-bold">
    Descripcion <br>
    <textarea name="description">{{ old('description', $project->description) }}</textarea>
</label>
<br>
