@extends('master')

@if(count($products))
<div class="row">
	<div class="col-xs-12">
	<h2>All of our fucking Products</h2>

	</div>
</div>
<div class="row">
	
	<ul>
		@foreach($products as $product)

	<div class="col-xs-3">

		<h3>{{$product->name}}</h3>
		<p>{{$product->description}}</p>
		<p>stock: {{$product->stock}}</p>
		<p>price: {{$product->price}}</p>
	
	</div>
	@endforeach
	
	</ul>	
	
</div>

	


@endif