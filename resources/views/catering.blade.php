@extends('app')

@section('content')
	<div class="cf" id="tablesContainer">
		<table class="productTable">
		<caption>Our Products</caption>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
			@foreach($menu as $item)
				<tr> 
					<td>{{$item->name}}</td>
					<td>${{ number_format($item->price, 2)}}</td>
					<td>
						<form action="/catering" method="post">
							<input type="number" name="quantity" min="0" step="1" placeholder="X"/>
							<input type="submit" name="addToCart" value="Add To Cart">
							<input type="hidden" name="productID" value="{{$item->id}}" />
							<input type="hidden" name="productName" value="{{$item->name}}" />
							<input type="hidden" name="productPrice" value="{{$item->price}}" />
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						</form>
					</td>
				</tr>
			@endforeach
		</table>
		@if(\Session::has('cart'))
		<table>
			<caption>Your Cart</caption>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
			<?php 
				$totalQuan = 0; 
				$totalPrice = 0;
			?>
			@foreach($cart as $item)
				<tr>
					<td>{{ $item['name'] }}</td>
					<td>${{ number_format($item['price'], 2) }}</td>
					<td>{{$item['quantity']}}</td>
				</tr>
				<?php 
					$totalQuan 	+= $item['quantity']; 
					$totalPrice += $item['price'] * $item['quantity']; 
				?>
			@endforeach
			<tr>
				<td><a class="emptyButton" href="/menu/empty">Empty</a></td>
				<td>${{number_format($totalPrice, 2)}}</td>
				<td>items:{{$totalQuan}}<a class="checkoutButton" href="/checkout">Checkout</a></td>
			</tr>
		</table>
		@endif
	</div>
@endsection

@section('scripts')
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/burger.js"></script>
@endsection