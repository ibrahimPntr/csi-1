<div class="form-group">
    <label class="form-label" for="nama">Nama</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Dosen') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="nip">NIP</label>
    {{ html()->text('nip')->class(['form-control', 'is-invalid' => $errors->has('nip')])->id('nip')->placeholder('NIP Dosen') }}
    @error('nip')
    <div class="invalid-feedback">{{ $errors->first('nip') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="name">NIDN</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('NIDN Dosen') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="nik">NIK</label>
    {{ html()->text('nik')->class(["form-control", "is-invalid" => $errors->has('nik')])->id('nik')->placeholder('NIK Dosen') }}
    @error('nik')
    <div class="invalid-feedback">{{ $errors->first('nik') }}</div>
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
            {{ html()->text('birthdate')->class(["form-control", "is-invalid" => $errors->has('birthdate')])->id('birthdate')->placeholder('Tanggal Lahir') }}
            @error('birthdate')
            <div class="invalid-feedback">{{ $errors->first('birthdate') }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="email">Email:</label>
    {{ html()->text('email')->class(["form-control", "is-invalid" => $errors->has('email')])->id('email')->placeholder('Email Dosen') }}
    @error('email')
    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="phone">No HP:</label>
    {{ html()->text('phone')->class(["form-control", "is-invalid" => $errors->has('phone')])->id('phone')->placeholder('No Handphone Dosen') }}
    @error('phone')
    <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
    @enderror
</div>

