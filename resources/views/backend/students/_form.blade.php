<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Mahasiswa') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- NIM Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nim">NIM</label>
    {{ html()->text('nim')->class(['form-control', 'is-invalid' => $errors->has('nim')])->id('nim')->placeholder('NIM Mahasiswa') }}
    @error('nim')
    <div class="invalid-feedback">{{ $errors->first('nim') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="year">Angkatan:</label>
    {{ html()->text('year')->class(["form-control", "is-invalid" => $errors->has('year')])->id('year')->placeholder('Angkatan') }}
    @error('year')
    <div class="invalid-feedback">{{ $errors->first('year') }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthplace">Tempat Lahir:</label>
            {{ html()->text('birthplace')->class(["form-control", "is-invalid" => $errors->has('birthplace')])->id('birthplace')->placeholder('Tempat Lahir') }}
            @error('birthplace')
            <div class="invalid-feedback">{{ $errors->first('birthplace') }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthdate">Tanggal Lahir:</label>
            {{ html()->date('birthdate')->class(["form-control", "is-invalid" => $errors->has('birthdate')])->id('birthdate')->placeholder('Tanggal Lahir') }}
            @error('birthdate')
            <div class="invalid-feedback">{{ $errors->first('birthdate') }}</div>
            @enderror
        </div>
    </div>
</div>

<!-- Department Input (Select) -->
<div class="form-group">
    <label class="form-label" for="department_id">Jurusan/Prodi:</label>
    {{ html()->select('department_id')->options($departments)->class(["form-control", "is-invalid" => $errors->has('department_id')])->id('department_id') }}
    @error('department_id')
    <div class="invalid-feedback">{{ $errors->first('department_id') }}</div>
    @enderror
</div>

<!-- Input (Select) gender-->
<div class="form-group">
    <label class="form-label" for="gender">Jenis Kelamin:</label>
    {{ html()->select('gender')->options($genders)->class(["form-control", "is-invalid" => $errors->has('gender')])->id('gender') }}
    @error('gender')
    <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="address">Alamat:</label>
    {{ html()->textarea('address')->class(["form-control", "is-invalid" => $errors->has('address')])->id('address') }}
    @error('address')
    <div class="invalid-feedback">{{ $errors->first('address') }}</div>
    @enderror
</div>

<!-- Input (Select) marital_status -->
<div class="form-group">
    <label class="form-label" for="marital_status">Marital Status:</label>
    {{ html()->select('marital_status')->options($marital_statuses)->class(["form-control", "is-invalid" => $errors->has('marital_status')])->id('marital_status') }}
    @error('marital_status')
    <div class="invalid-feedback">{{ $errors->first('marital_status') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="email">Email:</label>
    {{ html()->text('email')->class(["form-control", "is-invalid" => $errors->has('email')])->id('email')->placeholder('Email Mahasiswa') }}
    @error('email')
    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="phone">No HP:</label>
    {{ html()->text('phone')->class(["form-control", "is-invalid" => $errors->has('phone')])->id('phone')->placeholder('No Handphone Mahasiswa') }}
    @error('phone')
    <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="photo">Photo:</label>
    {{ html()->file('photo')->class(["form-control-file", "is-invalid" => $errors->has('photo')])->id('photo') }}
    @error('photo')
    <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
    @enderror
</div>
