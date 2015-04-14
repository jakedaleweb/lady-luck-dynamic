@extends('app')

@section('content')
<div id="contentContainer" class="cf">
	<h1>Orders</h1>
	@if(count($orders) > 0)
		@foreach($orders as $order)
			<div class="contentItem">
				<h3><a href="orders/{{$order->id}}">Order for {{$order->customerName}}</a></h3>
				<a href="orders/{{$order->id}}"><img src='http://placehold.it/120x120' alt="lady luck order"></a>
				<p>{{$order->customerEmail}}</p>
				@if($order->delivery = 'deliver')
					<p>{{$order->customerAddress}}</p>
				@endif
				<p>due: {{$order->deliveryDate}}</p>
			</div>
		@endforeach
	@else
		 <div class="contentItem">
			<p>There are no orders currently</p>
		</div>
	@endif
</div>

	
@endsection