@extends('app')

@section('content')
<div class="container-fluid">
	<form method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div>
			<label>username</label>
			<div>
				<input type="text" class="form-control" name="name" value="{{ old('name') }}">
			</div>
		</div>

		<div>
			<label>Password</label>
			<div>
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div>
			<div>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" value="login" name="login" >
			</div>
		</div>
	</form>
</div>
@endsection
