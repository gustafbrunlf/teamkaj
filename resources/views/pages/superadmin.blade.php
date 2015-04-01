@extends('master')
@section('body')
@if(count($admins))

	@foreach($admins as $admin)
		@if(Auth::user()->admin === 0)
			{{$admin->name}}

{!!Form::open(["method" => "DELETE","action" => ["AdminController@destroy",$admin->id]])!!}
<div class="btn-group">
	<a href="{{action('AdminController@edit',$admin->id)}}" class="btn btn-success">Edit User</a>
	{!! Form::submit("deleteAdmin",["class"=>"btn btn-danger"])!!}
</div>
{!!Form::close()!!}
		@endif
	@endforeach
	@else
	<p>no users stupid</p>
@endif
<a href="{{action('AdminController@create')}}">Add admins</a>	
@stop