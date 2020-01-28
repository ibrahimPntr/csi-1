{!! html()->hidden('thesis_id')->value($thesis_id) !!}
<!-- thesis Topic select Field Input -->
<div class="form-group">
    <label class="form-label" for="lecturer_id">Topik:</label>
    {{ html()->select('lecturer_id',$lecturers)->class(["form-control", "is-invalid" => $errors->has('lecturer_id')])->id('lecturer_id') }}
    @error('lecturer_id')
    <div class="invalid-feedback">{{ $errors->first('lecturer_id') }}</div>
    @enderror
</div>


