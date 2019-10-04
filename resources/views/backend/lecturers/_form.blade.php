<div class="form-group">
    <label for="nama">Nama</label>
    {{ html()->text('name')->class('form-control')->id('name')->placeholder('Nama Dosen') }}
</div>

<div class="form-group">
    <label for="nip">NIP</label>
    {{ html()->text('nip')->class('form-control')->id('nip')->placeholder('NIP Dosen') }}
</div>

<div class="form-group">
    <label for="nidn">NIDN</label>
    {{ html()->text('nidn')->class('form-control')->id('nidn')->placeholder('NIDN Dosen') }}
</div>

<div class="form-group">
    <label for="nik">NIK</label>
    {{ html()->text('nik')->class('form-control')->id('nik')->placeholder('NIK Dosen') }}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            {{ html()->text('birthplace')->class('form-control')->id('birthplace')->placeholder('Tempat Lahir Dosen') }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir">Tanggal Lahir</label>
            {{ html()->date('birthdate')->class('form-control')->id('birthdate')->placeholder('Tanggal Lahir') }}
        </div>
    </div>
</div>

<div class="form-group">
    <label for="email">email</label>
    {{ html()->text('email')->class('form-control')->id('email')->placeholder('Email Dosen') }}
</div>

<div class="form-group">
    <label for="phone">No. HP</label>
    {{ html()->text('phone')->class('form-control')->id('phone')->placeholder('No Telpon Dosen') }}
</div>

