@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Do you want to delete category: {{ $category->name }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 form">
            <div class="btn-group">
            {!! Form::open(['method' => 'DELETE', 'action' => ['CategoriesController@destroy', $category->id]]) !!}
                @if(Auth::user()->user_type == 0)
                    {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                    <a href=" {{ action('CategoriesController@create') }} " class="btn btn-default">No</a>
                @endif
            {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection