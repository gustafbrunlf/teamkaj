@extends('master')

@section('body')

    <div class="row">
        <div class="col-md-6 form">

            <h2>Create new category</h2>
            {!! Form::open(['url' => 'categories']) !!}
            @include('pages._categoryform',['submitButtonText' => 'Add Category'])
            {!! Form::close()!!}

            @include('errors.list')
        </div>
    </div>

	<div class="row">
        <div class="col-md-8 edit_list_cats admin-table">
        	<h2>Edit categories</h2>

            <table>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{action('CategoriesController@edit', [$category->slug])}}" class="btn btn-default category">Edit</a></td>
                    </tr>
                @endforeach
            </table>

		</div>
	</div>

	<div class="row">
        <div class="col-md-8">
        	<br><br>
            <a href=" {{ action('ProductsController@index') }} ">Back</a>
        </div>
    </div>

@stop
