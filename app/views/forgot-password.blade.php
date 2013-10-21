@extends('_layout')

@section('content')
<div class="row-fluid">
	<div class="span4 offset4">
		<form method="POST">
			<fieldset>
				<legend>Forgot Password</legend>
				@if (Session::has('error'))
				{{ trans(Session::get('reason')) }}
				@elseif (Session::has('success'))
				An e-mail with the password reset has been sent.
				@endif
				{{ $errors->first('username', '<div class="alert alert-error">:message</div>') }}
				<label><input class="input-block-level" type="text" placeholder="Username" name="username"></label>
				<button type="submit" class="btn pull-right">Send Password Reset Email</button>
			</fieldset>
		</form>
	</div>
</div>
@stop