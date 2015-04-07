@extends('master')

@section('body')

	<div class="row">
        <div class="col-xs-12">
            <h2>Create catgory</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 form">
			{!! Form::open(['url' => 'categories']) !!}
			@include('pages._createCategoryForm',['submitButtonText' => 'Create Category'])
			{!! Form::close()!!}

			@include('errors.list')
		</div>
	</div>

	<div class="row">
        <div class="col-md-8">
        	<ul>
	        	@foreach($categories as $category)

	        		<li><a href="{{action('CategoriesController@edit', [$category->slug])}}">{{$category->name}}</a></li>

	        	@endforeach
        	</ul>
		</div>
	</div>



            <br>

            <a href=" {{ action('ProductsController@index') }} ">Back</a>


        </div>

    </div>



@stop
