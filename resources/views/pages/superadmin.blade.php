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

                <table>
                    <thead>
                        <th>Name:</th>
                        <th>Last login:</th>
                    </thead>
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->last_login }}</td>
                        <td><a href="{{action('AdminController@edit',$admin->id)}}" class="btn btn-default">Edit Admin</a></td>
                    </tr>
                </table>
            <hr>

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