@extends('app')

@section('content')

<div id="contentContainer" class="cf">
	<h1>Order for {{$order->customerName}}</h1>
	<div class="contentItem">
		@foreach($products as $product)
			<p>{{$product->quantity}} x {{$product->name}} | individual price: ${{number_format($product->price, 2)}} | total: ${{ number_format($product->price * $product->quantity, 2)}}</p>
		@endforeach
		<h2>${{number_format($total, 2)}}</h2>
	</div>
</div>

	
@endsection