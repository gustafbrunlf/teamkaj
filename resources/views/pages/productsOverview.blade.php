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

		@if ($product->user_id != null)

			<td>{{ $users[$product->user_id-1]->name }}</td>

		@else

			<td>Unowned</td>

		@endif


		@if ($product->published)

			<td>{{ 'published' }}</td>

		@else

			<td>{{ 'unpublished' }}</td>

		@endif


		<td><a href="{{action('ProductsController@edit', [$product->slug])}}" class="btn btn-default">Edit</a></td>
	</tr>


	@endforeach

</table>

@endsection