<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name', $staff->name)->class('form-control-plaintext') }}
</div>

<!-- Nip Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nip">NIP</label>
    {{ html()->text('nip', $staff->nip )->class('form-control-plaintext') }}
</div>

<!-- Nik Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nik">NIK:</label>
    {{ html()->text('nik', $staff->nik)->class('form-control-plaintext') }}
</div>

<!-- Karpeg Text Field Input -->
<div class="form-group">
    <label class="form-label" for="karpeg">Karpeg:</label>
    {{ html()->text('karpeg',$staff->karpeg )->class('form-control-plaintext') }}
</div>

<!-- Npwp Text Field Input -->
<div class="form-group">
    <label class="form-label" for="npwp">NPWP:</label>
    {{ html()->text('npwp', $staff->npwp)->class('form-control-plaintext') }}
</div>

<!-- Department Text Field Input -->
<div class="form-group">
    <label class="form-label" for="department">Jurusan:</label>
    {{ html()->text('department', optional($staff->department)->name)->class('form-control-plaintext') }}
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthplace">Tempat Lahir:</label>
            {{ html()->text('npwp', $staff->birthplace)->class('form-control-plaintext') }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthdate">Tanggal Lahir:</label>
            {{ html()->text('npwp', $staff->birthdate)->class('form-control-plaintext') }}
        </div>
    </div>
</div>

<!-- Gender Text Field Input -->
<div class="form-group">
    <label class="form-label" for="gender">Jenis Kelamin:</label>
    {{ html()->text('gender', $staff->gender ? data_get($genders, $staff->gender, '-') : "-")->class('form-control-plaintext') }}
</div>

<!-- Religion Input (Select) -->
<div class="form-group">
    <label class="form-label" for="religion">Agama:</label>
    {{ html()->text('religion', $staff->religion ? data_get($religions, $staff->religion, '-') : '-')->class('form-control-plaintext') }}
</div>

<!-- Input (Select) marital_status -->
<div class="form-group">
    <label class="form-label" for="marital_status">Marital Status:</label>
    {{ html()->text('marital_status', $staff->marital_status ? data_get($marital_statuses, $staff->marital_status, '-'): "-")->class('form-control-plaintext') }}
</div>

<!-- Input (Select) association_type-->
<div class="form-group">
    <label class="form-label" for="association_type">Jenis Ikatan Kerja:</label>
    {{ html()->text('association_type', $staff->association_type? data_get($association_types, $staff->association_type, '-'): '-')->class('form-control-plaintext') }}
</div>

<div class="form-group">
    <label class="form-label" for="email">Email:</label>
    {{ html()->text('email', $staff->email)->class('form-control-plaintext')->id('email')->placeholder('Email Dosen') }}
</div>

<div class="form-group">
    <label class="form-label" for="phone">No HP:</label>
    {{ html()->text('phone', $staff->phone)->class('form-control-plaintext') }}
</div>

<div class="form-group">
    <label class="form-label" for="address">Alamat:</label>
    {{ html()->textarea('address', $staff->address)->class('form-control-plaintext') }}
</div>
