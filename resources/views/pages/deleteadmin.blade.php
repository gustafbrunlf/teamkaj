@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Are you sure you want to delete admin: {{ $admin->name }} ?</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!!Form::open(["method" => "DELETE","action" => ["AdminController@destroy",$admin->id]])!!}

            <div class="btn-group">
                {!! Form::submit("Yes",["class"=>"btn btn-danger"])!!}
                <a href="{{action('AdminController@edit',$admin->id)}}" class="btn btn-default">No</a>
            </div>
            <hr>

            {!!Form::close()!!}

        </div>

    </div>
@stop