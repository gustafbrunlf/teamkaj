@extends('master')

@if(count($products))
	<h2>All of our fucking Products</h2>
	<ul>
	
	@foreach($products as $product)

		<h3>{{$product->name}}</h3>
		<p>{{$product->description}}</p>
		<p>stock: {{$product->stock}}</p>
		<p>price: {{$product->price}}</p>
	
	@endforeach
	
	</ul>

@endif