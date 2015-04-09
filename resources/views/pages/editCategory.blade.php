@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Edit category</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 form">

            {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoriesController@update', $category->id]]) !!}

            @include('pages._categoryform', ['submitButtonText' => 'Update category'])

            {!! Form::close() !!}



            {!! Form::open(['method' => 'DELETE', 'action' => ['CategoriesController@destroy', $category->id]]) !!}
                @if(Auth::user()->user_type === 0)
                    {!! Form::submit('Delete category', ['class' => 'btn btn-danger form-control']) !!}
                @endif
                <br><br>
            {!! Form::close() !!}


            @include('errors.list')

        </div>
    </div>

    <div class="row">
        <div class="col-md-8 form">
            <br>
            <a href=" {{ action('CategoriesController@create') }} ">Back</a>
        </div>
    </div>

@endsection