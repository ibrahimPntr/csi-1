<div class="form row">
  <div class="form-group col-md-4">
      <label class="form-label" for="position">Posisi</label>
      {{ Form::select('positions',[0=>'Ketua',1=>'Anggota'],$exist->exist,['class'=>'form-control','id'=>'positions','disabled'=>'true'])}}
      @error('positions')
      <div class="invalid-feedback">{{ $errors->first('positions') }}</div>
      @enderror
  </div>

  <div class="form-group col-md-8">
      <label class="form-label" for="user_id">Nama</label>
      {{ Form::select('user_id[]',$user,null,['class' => 'form-control','id' => 'user_id','multiple'=>'true'])}}
      @error('user_id')
      <div class="invalid-feedback">{{ $errors->first('user_id') }}</div>
      @enderror
  </div>

  <div class="form-group">
      {{ html()->hidden('research_id')->value($research->id)->class(["form-control", "is-invalid" => $errors->has('research_id')])->id('research_id')->placeholder('Judul Penelitian') }}
      @error('title')
      <div class="invalid-feedback">{{ $errors->first('title') }}</div>
      @enderror
  </div>
  <div class="form-group">
      {{ html()->hidden('position')->value($exist->exist)->class(["form-control", "is-invalid" => $errors->has('position')])->id('position')}}
      @error('position')
      <div class="invalid-feedback">{{ $errors->first('position') }}</div>
      @enderror
  </div>

</div>
