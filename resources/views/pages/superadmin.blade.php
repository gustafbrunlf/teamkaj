@extends('master')
@section('body')
@if(count($admins))

    <div class="row">
        <div class="col-xs-12">
            <h2>Admins</h2>
        </div>
    </div>

	@foreach($admins as $admin)

		@if(Auth::user()->user_type === 0)

			<p>{{$admin->name}}</p>

            {!!Form::open(["method" => "DELETE","action" => ["AdminController@destroy",$admin->id]])!!}

            <div class="btn-group">
                <a href="{{action('AdminController@edit',$admin->id)}}" class="btn btn-default">Edit Admin</a>
                {!! Form::submit("Delete Admin",["class"=>"btn btn-danger"])!!}
            </div>
            <hr>

            {!!Form::close()!!}

		@endif

	@endforeach
@else
    <div class="row">
        <div class="col-xs-12">
            <h2>No admins</h2>
        </div>
    </div>
@endif
<a href="{{action('AdminController@create')}}" class="btn btn-primary">Add Admin</a>
@stop