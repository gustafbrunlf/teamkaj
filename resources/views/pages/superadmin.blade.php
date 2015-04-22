@extends('master')
@section('body')
@if(count($admins))

    <div class="row">
        <div class="col-xs-12">
            <h2>Admins</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 admin-table">   

            @if(Auth::user()->user_type == 0)

                <table>
                     <thead>
                        <th>Name:</th>
                        <th>Last login:</th>
                        <th> <a href="{{action('AdminController@create')}}" class="btn btn-primary">Add Admin</a> </th>
                    </thead>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{ $admin->name }}</td>

                            @if($admin->last_login == null)
                            <td><span class="italic"> Never</span></td>
                            @else
                            <td>{{ $admin->last_login }}</td>
                            @endif

                            <td><a href="{{action('AdminController@edit',$admin->id)}}" class="btn btn-default">Edit Admin</a></td>

                            @if ($admin->password == null && !in_array($admin->email, $resets))

                            <td>

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="email" value="{{ $admin->email }}">

                                        <button type="submit" class="btn btn-primary">
                                            Send Password Create Link
                                        </button>
                                </form>

                            </td>

                            @endif

                        </tr>                    
                    @endforeach
                </table>

        	@endif       	
         
            @else    
            <h2>No admins</h2>

            <a href="{{action('AdminController@create')}}" class="btn btn-primary">Add Admin</a>

            @endif

        </div>
    </div>

@stop