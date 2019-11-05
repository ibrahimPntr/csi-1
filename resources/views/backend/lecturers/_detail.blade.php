<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name', $lecturer->name)->class('form-control-plaintext') }}
</div>

<!-- Nip Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nip">NIP</label>
    {{ html()->text('nip', $lecturer->nip )->class('form-control-plaintext') }}
</div>

<!-- Nidn Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nidn">NIDN:</label>
    {{ html()->text('nidn', $lecturer->nind)->class('form-control-plaintext') }}
</div>

<!-- Nik Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nik">NIK:</label>
    {{ html()->text('nik', $lecturer->nik)->class('form-control-plaintext') }}
</div>

<!-- Karpeg Text Field Input -->
<div class="form-group">
    <label class="form-label" for="karpeg">Karpeg:</label>
    {{ html()->text('karpeg',$lecturer->karpeg )->class('form-control-plaintext') }}
</div>

<!-- Npwp Text Field Input -->
<div class="form-group">
    <label class="form-label" for="npwp">NPWP:</label>
    {{ html()->text('npwp', $lecturer->npwp)->class('form-control-plaintext') }}
</div>

<!-- Department Text Field Input -->
<div class="form-group">
    <label class="form-label" for="department">Jurusan:</label>
    {{ html()->text('department', optional($lecturer->department)->name)->class('form-control-plaintext') }}
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthplace">Tempat Lahir:</label>
            {{ html()->text('npwp', $lecturer->birthplace)->class('form-control-plaintext') }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthday">Tanggal Lahir:</label>
            {{ html()->text('npwp', $lecturer->birthday)->class('form-control-plaintext') }}
        </div>
    </div>
</div>

<!-- Gender Text Field Input -->
<div class="form-group">
    <label class="form-label" for="gender">Jenis Kelamin:</label>
    {{ html()->text('gender', $lecturer->gender ? data_get($genders, $lecturer->gender, '-') : "-")->class('form-control-plaintext') }}
</div>

<!-- Religion Input (Select) -->
<div class="form-group">
    <label class="form-label" for="religion">Agama:</label>
    {{ html()->text('religion', $lecturer->religion ? data_get($religions, $lecturer->religion, '-') : '-')->class('form-control-plaintext') }}
</div>

<!-- Input (Select) marital_status -->
<div class="form-group">
    <label class="form-label" for="marital_status">Marital Status:</label>
    {{ html()->text('marital_status', $lecturer->marital_status ? data_get($marital_statuses, $lecturer->marital_status, '-'): "-")->class('form-control-plaintext') }}
</div>

<!-- Input (Select) association_type-->
<div class="form-group">
    <label class="form-label" for="association_type">Jenis Ikatan Kerja:</label>
    {{ html()->text('association_type', $lecturer->association_type? data_get($association_types, $lecturer->association_type, '-'): '-')->class('form-control-plaintext') }}
</div>

<div class="form-group">
    <label class="form-label" for="email">Email:</label>
    {{ html()->text('email', $lecturer->email)->class('form-control-plaintext')->id('email')->placeholder('Email Dosen') }}
</div>

<div class="form-group">
    <label class="form-label" for="phone">No HP:</label>
    {{ html()->text('phone', $lecturer->phone)->class('form-control-plaintext') }}
</div>

<div class="form-group">
    <label class="form-label" for="address">Alamat:</label>
    {{ html()->textarea('address', $lecturer->address)->class('form-control-plaintext') }}
</div>
