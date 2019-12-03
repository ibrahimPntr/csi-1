<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name', $student->name)->class('form-control-plaintext') }}
</div>

<!-- Nim Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nim">NIM</label>
    {{ html()->text('nim', $student->nim )->class('form-control-plaintext') }}
</div>

<!-- Year Text Field Input -->
<div class="form-group">
    <label class="form-label" for="year">Angkatan:</label>
    {{ html()->text('year', $student->year)->class('form-control-plaintext') }}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthplace">Tempat Lahir:</label>
            {{ html()->text('birthplace', $student->birthplace)->class('form-control-plaintext') }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthdate">Tanggal Lahir:</label>
            {{ html()->text('birthdate', $student->birthdate)->class('form-control-plaintext') }}
        </div>
    </div>
</div>

<!-- Department Text Field Input -->
<div class="form-group">
    <label class="form-label" for="department">Jurusan:</label>
    {{ html()->text('department', optional($student->department)->name)->class('form-control-plaintext') }}
</div>

<!-- Gender Text Field Input -->
<div class="form-group">
    <label class="form-label" for="gender">Jenis Kelamin:</label>
    {{ html()->text('gender', $student->gender ? data_get($genders, $student->gender, '-') : "-")->class('form-control-plaintext') }}
</div>


<div class="form-group">
    <label class="form-label" for="address">Alamat:</label>
    {{ html()->textarea('address', $student->address)->class('form-control-plaintext') }}
</div>

<!-- Input (Select) marital_status -->
<div class="form-group">
    <label class="form-label" for="marital_status">Marital Status:</label>
    {{ html()->text('marital_status', $student->marital_status ? data_get($marital_statuses, $student->marital_status, '-'): "-")->class('form-control-plaintext') }}
</div>

<div class="form-group">
    <label class="form-label" for="email">Email:</label>
    {{ html()->text('email', $student->email)->class('form-control-plaintext')->id('email')->placeholder('Email Mahasiswa') }}
</div>

<div class="form-group">
    <label class="form-label" for="phone">No HP:</label>
    {{ html()->text('phone', $student->phone)->class('form-control-plaintext') }}
</div>
