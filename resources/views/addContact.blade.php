@extends('app')

@section('content')
	<div id="contentContainer">
		<h1>Add Contact Information</h1>
		<form method="post">
			<p>
				<label for="description">Information</label>
				{!!$errors->first('description', '<span>:message</span>')!!}
			</p>
			<p>
				<textarea id="description" name="description">{{\Input::old('description')}}</textarea>
			</p>
			<p>
				<label for="type">type</label>
				{!!$errors->first('type', '<span>:message</span>')!!}
			</p>
			<p>
				<select name="type" id="type">
					<option {!! \Input::old('type') == 'phone' ? 'selected="selected"' : '' !!} value="phone">Phone</option>	
					<option {!! \Input::old('type') == 'post' ? 'selected="selected"' : '' !!} value="post">Post</option>	
					<option {!! \Input::old('type') == 'email' ? 'selected="selected"' : '' !!} value="email">Email</option>		
				</select>
			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="add" value="add">
			</p>
		</form>
	</div>
@endsection