@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Hobi 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Hobi</label>	
			  			<input class="form-control" value="{{ $a->eskul }}"  readonly>
			  		</div>

			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Hobi</label>	
			  			<input class="form-control" value="{{ $a->peminat }}"  readonly>
			  		</div>	
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection