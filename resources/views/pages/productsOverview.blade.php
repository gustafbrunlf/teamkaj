@extends('master');

@section('body')

<table>

	<tr>
		<td>Name</td>
		<td>Art. No.</td>
		<td>Price</td>
		<td>Stock</td>
		<td>Created</td>
		<td>Updated</td>
		<td>Created By</td>
		<td>Published</td>
	</tr>

	@foreach($products as $product)

	<tr>
		<td>{{ $product->name }}</td>
		<td>{{ $product->artNo }}</td>
		<td>{{ $product->price }}</td>
		<td>{{ $product->stock }}</td>
		<td>{{ $product->created_at }}</td>
		<td>{{ $product->updated_at }}</td>
		<td>{{ $product->user_id }}</td>
		<td>{{ $product->published }}</td>
		<td><a href="{{action('ProductsController@edit', [$product->slug])}}" class="btn btn-default">Edit</a></td>
	</tr>


	@endforeach

</table>

@endsection