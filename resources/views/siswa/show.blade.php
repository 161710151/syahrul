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
			  			<label class="control-label">Nama Siswa</label>	
			  			<input class="form-control" value="{{ $mhs->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">NIM</label>
						<input class="form-control" value="{{ $mhs->nim }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Kelas</label>
						<input class="form-control" value="{{ $mhs->kelas }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Guru Mapel</label>
						<input class="form-control" value="{{ $mhs->guru->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
                    <strong>eskul</strong><br>@foreach($mhs->eskul as $data){{ $data->eskul }}, @endforeach


			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection