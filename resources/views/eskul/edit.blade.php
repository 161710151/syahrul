@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data peminat 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('eskul.update',$a->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}

			  		<div class="form-group {{ $errors->has('eskul') ? ' has-error' : '' }}">
			  			<label class="control-label">eskul</label>	
			  			<input type="text" name="eskul" class="form-control" value="{{ $a->eskul }}"  required>
			  			@if ($errors->has('eskul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('eskul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('peminat') ? ' has-error' : '' }}">
			  			<label class="control-label">peminat</label>	
			  			<input type="text" name="peminat" class="form-control" value="{{ $a->eskul }}"  required>
			  			@if ($errors->has('peminat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('peminat') }}</strong>
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