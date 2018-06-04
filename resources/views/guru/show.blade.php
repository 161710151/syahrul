@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama</label>	
			  			<input class="form-control" value="{{ $a->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">NIPD</label>	
			  			<input class="form-control" value="{{ $a->nipd }}"  readonly>
			  		</div>

			   		<div class="form-group">
			  			<label class="control-label">Mata Pelajaran</label>	
			  			<input class="form-control" value="{{ $a->mapel }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Siswa</label>	
			  			<textarea class="form-control" readonly>@foreach($a->siswa as $data)
			  				-{{ $data->nama }}
			  				@endforeach
			  			</textarea> 
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection