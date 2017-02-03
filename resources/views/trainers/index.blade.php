@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Email</th>
				<th>Create Date</th>
				<th>Update Date</th>
				<th>Action</th>
			</tr>
			@php $sl=1 @endphp
			@foreach ($trainers as $item)
				
			 
			<tr>
				<td>{{$sl}}</td>
				<td>{{$item->name}}</td>
				<td>{{$item->email}}</td>
				<td>{{Carbon\Carbon::parse($item->created_at)->format('l jS \of F Y h:i:s A')}}</td>
				<td>{{Carbon\Carbon::parse($item->updated_at)->format('l jS \of F Y h:i:s A')}}</td>
				<td><a class="btn btn-success" href="{{ URL::to('trainers/' . $item->id . '/edit') }}">Edit</a></td>
				<td>{!! Form::delete(route('trainers.destroy',$item->id),'Delete',array('class' => 'btn btn-warning')) !!}</td>
			</tr>
				@php $sl++ @endphp
			@endforeach 
		</table>
	</div>
</div>
</div>

@stop