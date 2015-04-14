@extends('app')

@section('content')
	<div id="contentContainer">
		<h1>Edit Contact Information</h1>
		<form method="post">
			<p>
				<label for="description">Information</label>
				{!!$errors->first('description', '<span>:message</span>')!!}
			</p>
			<p>
				<textarea id="description" name="description">{{$contact->description}}</textarea>
			</p>
			<p>
				<label for="type">type</label>
				{!!$errors->first('type', '<span>:message</span>')!!}
			</p>
			<p>
				<select name="type" id="type">
					<option {!! $contact->type == 'phone' 	? 'selected="selected"' : '' !!} value="phone">Phone</option>	
					<option {!! $contact->type =='post' 	? 'selected="selected"' : '' !!} value="post">Post</option>	
					<option {!! $contact->type == 'email' 	? 'selected="selected"' : '' !!} value="email">Email</option>		
				</select>
			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="edit" value="Edit">
			</p>
		</form>
	</div>
@endsection