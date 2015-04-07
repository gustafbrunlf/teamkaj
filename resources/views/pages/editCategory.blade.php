@extends('master')

@section('body')

    <div class="row">
        <div class="col-xs-12">
            <h2>Edit product</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 form">

            {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoriesController@update', $category->id]]) !!}

            @include('pages._createCategoryForm', ['submitButtonText' => 'Update category'])

            {!! Form::close() !!}



            {!! Form::open(['method' => 'DELETE', 'action' => ['CategoriesController@destroy', $category->id]]) !!}
                @if(Auth::user()->user_type === 0)
                    {!! Form::submit('Delete Category', ['class' => 'btn btn-danger form-control']) !!}
                @endif
            {!! Form::close() !!}


            @include('errors.list')

            <br>

            <a href=" {{ action('CategoriesController@create') }} ">Back</a>

        </div>

    </div>

@endsection