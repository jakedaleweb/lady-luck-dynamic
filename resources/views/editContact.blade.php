@extends('app')

@section('content')
	<div id="contentContainer">
		<h1>Edit Contact Information</h1>
		{!! Form::open(array('route' => 'contact.edit')) !!}
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
				{!! Form::select('type', ['phone' => 'Phone', 'post' => 'Post', 'email' => 'email'], $contact->contactType) !!}

			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="edit" value="Edit">
			</p>
		{!! Form::close() !!}
	</div>
@endsection

