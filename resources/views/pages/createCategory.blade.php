@extends('master')

@section('body')

	<div class="row">
        <div class="col-md-8 edit_list_cats">
        	<h2>Edit categories</h2>

        	<ul>
	        	@foreach($categories as $category)

	        		<a href="{{action('CategoriesController@edit', [$category->slug])}}"><li>{{$category->name}} <span class="edit">EDIT</span></li></a>

	        	@endforeach
        	</ul>
		</div>
	</div>

	<div class="row">
        <div class="col-md-8 form">

        	<h2>Create new category</h2>
			{!! Form::open(['url' => 'categories']) !!}
			@include('pages._categoryform',['submitButtonText' => 'Add Category'])
			{!! Form::close()!!}

			@include('errors.list')
		</div>
	</div>

	<div class="row">
        <div class="col-md-8">
        	<br>
            <a href=" {{ action('ProductsController@index') }} ">Back</a>
        </div>
    </div>

@stop
