@csrf
<label>
    Titulo del proyecto <br>
    <input type="text" name="tittle" value="{{ old('tittle', $project->tittle) }}">
</label>
<br>
<label>
    Descripcion <br>
    <textarea name="description">{{ old('description', $project->description) }}</textarea>
</label>
<br>
