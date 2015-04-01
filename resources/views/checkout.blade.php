@extends('app')

@section('content')
	<div id="contentContainer">
	<h1>Checkout</h1>
	<h3>Please double check your order before continuing</h3>
	<?php 
		$totalPrice = ''; 
		$totalQuan = '';
	?>
	@foreach($cart as $item)
		<ul>
			<li>{{$item['name']}}</li>
			<li>${{number_format($item['price'] * $item['quantity'],2)}}</li>
			<li>quantity: {{$item['quantity']}}</li>
		</ul>
		<?php 
			$totalPrice 	+= $item['price'] * $item['quantity'];  
			$totalQuan	 	+= $item['quantity'];  
		?>
	@endforeach
	{{$message}}
		<h2>Total Cost:${{$totalPrice}}</h2>
		<h2>Total items: {{$totalQuan}}</h2>
		<h2></h2>
		<form action="/catering/checkout" method="post" id="checkoutForm">
			<p>
				<label for="orderName">Your Name: </label>
				{!!$errors->first('orderName', '<span>:message</span>')!!}	
			</p>
			<p>
				<input type="text" id="orderName" name="orderName" />
			</p>

			<p>
				<label for="orderAddress">Catering Address: </label>
			</p>
			<p>
				<textarea type="text" id="orderAddress" name="orderAddress"> </textarea>
				{!!$errors->first('orderAddress', '<span>:message</span>')!!}	
			</p>
			<p>
				<label for="orderEmail">Email: </label>
			</p>
			<p>
				<input type="email" id="orderEmail" name="orderEmail"/>
				{!!$errors->first('orderEmail', '<span>:message</span>')!!}	
			</p>
			<p>
				<label for="orderDate">When would you like the order? </label>
			</p>
			<p>
				<input type="date" value="<?php echo date('Y-m-d'); ?>" name="orderDate" id="orderDate"/>
				{!!$errors->first('orderDate', '<span>:message</span>')!!}
			</p>
			<p>
				<label for="deliver">Delivery</label>
				<input id="deliver" checked="checked" type="radio" name="delivery" value="deliver" />
				<label for="pickup">Pickup</label>
				<input id="pickup" type="radio" name="delivery" value="pickup" />
				{!!$errors->first('delivery', '<span>:message</span>')!!}
			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="submitOrder" value="Submit Order" />
			</p>
		</form>
	</div>
@endsection

@section('scripts')
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/burger.js"></script>
@endsection