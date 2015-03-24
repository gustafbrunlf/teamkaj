@extends('master')

@if(count($products))
	<h2>All of our fucking Products</h2>
	<ul>
	
	@foreach($products as $product)

		<li>{{$product}}</li>
	
	@endforeach
	
	</ul>

@endif