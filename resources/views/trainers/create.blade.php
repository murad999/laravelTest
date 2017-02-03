@extends('layouts.app')
@section('content')

<div class="row">
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<div class="col-md-8">
		{{ Form::model(request()->old(),['route' =>'trainers.store']) }}
		<div class="form-group">
		    {{ Form::label('name', null, ['class' => 'control-label']) }}
		    {{ Form::text('name', null,['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		    {{ Form::label('email', null, ['class' => 'control-label']) }}
		    {{ Form::text('email', null,['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		    {{ Form::label('password', null, ['class' => 'control-label']) }}
		    {{ Form::password('password', null,['class' => 'form-control']) }}
		</div>
			{{ Form::submit('Submit',array('class'=>'btn btn-success')) }}

		{{ Form::close() }}
	</div>
</div>

@stop
