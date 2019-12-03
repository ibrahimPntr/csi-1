<!-- Title Text Field Input -->
<div class="form-group">
    <label class="form-label" for="title">Judul Penelitian</label>
    {{ html()->text('title')->class(["form-control", "is-invalid" => $errors->has('title')])->id('title')->placeholder('Judul Penelitian') }}
    @error('title')
    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    @enderror
</div>

<!-- NIP Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nip">Skema yang digunakan</label>
    {{ html()->select('research_schema_id')->options($research_schemas)->class(["form-control", "is-invalid" => $errors->has('research_schema_id')])->id('research_schema_id')->placeholder('Skema yang digunakan') }}
    @error('research_schema_id')
    <div class="invalid-feedback">{{ $errors->first('research_schema_id') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="name">Tahun Pelaksanaan</label>
    {{ html()->select('start_at')->options(range(2000, 2050))->class(["form-control", "is-invalid" => $errors->has('start_at')])->id('start_at')->placeholder('Tahun Pelaksanaan') }}
    @error('start_at')
    <div class="invalid-feedback">{{ $errors->first('start_at') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="nik">Dana Penelitian</label>
    {{ html()->text('fund_amount')->class(["form-control", "is-invalid" => $errors->has('fund_amount')])->id('fund_amount')->placeholder('Dana Penelitian') }}
    @error('fund_amount')
    <div class="invalid-feedback">{{ $errors->first('fund_amount') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="karpeg">File Proposal</label>
    <div class="custom-file">
        {{ html()->file('proposal_file')->class(["custom-file-input", "is-invalid" => $errors->has('proposal_file')])->id('proposal_file') }}
        <label class="custom-file-label" for="karpeg">File Proposal</label>
        @error('proposal_file')
        <div class="invalid-feedback">{{ $errors->first('proposal_file') }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="npwp">File Laporan</label>
    <div class="custom-file">
        {{ html()->file('report_file')->class(["custom-file-input", "is-invalid" => $errors->has('report_file')])->id('report_file') }}
        <label class="custom-file-label" for="npwp">File Laporan</label>
        @error('report_file')
        <div class="invalid-feedback">{{ $errors->first('report_file') }}</div>
        @enderror
    </div>
</div>
