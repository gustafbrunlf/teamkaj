@extends('master')

@section('dropdown')

 <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
       
	@foreach($categories as $categories)
       <li><a href="{{action('CategoryController@show', [$categories->slug])}}">{{$categories->name}}</a></li>
    @endforeach

    </ul>
</li>

@endsection