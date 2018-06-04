@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Siswa 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('siswa.update',$mhs->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Siswa</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $mhs->nama }}" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nim') ? ' has-error' : '' }}">
			  			<label class="control-label">NIM</label>	
			  			<input type="text" value="{{ $mhs->nim }}" name="nim" class="form-control"  required>
			  			@if ($errors->has('nim'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nim') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kelas') ? ' has-error' : '' }}">
			  			<label class="control-label">Kelas</label>	
			  			<input type="text" value="{{ $mhs->kelas }}" name="kelas" class="form-control"  required>
			  			@if ($errors->has('kelas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kelas') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('guru_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Guru Mapel</label>	
			  			<select name="guru_id" class="form-control">
			  				@foreach($guru as $data)
			  				<option value="{{ $data->id }}" {{ $selectedguru == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('guru_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('guru_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('eskul') ? ' has-error' : '' }}">
			  			<label class="control-label">Eskul</label>	
			  			<select name="eskul[]" class="form-control js-example-basic-multiple" multiple="multiple">
			  				@foreach($a as $data)
			  				<option value="{{ $data->id }}"{{ (in_array($data->id, $selected)) ? ' selected="selected"' : '' }}>{{ $data->eskul }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('eskul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('eskul') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection