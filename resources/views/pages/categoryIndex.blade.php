@extends('master')
@section('body')
@foreach($categories as $category )
<h2><a href="{{ action('CategoriesController@show',$category->slug)}}">{{$category->name}}</a></h2>
@endforeach
<h2><a href="{{ action('CategoriesController@show','uncategorized')}}">Uncategorized</a></h2>
@stop
