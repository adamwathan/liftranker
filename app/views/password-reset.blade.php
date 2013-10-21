@extends('_layout')

@section('content')
<div class="row-fluid">
	<div class="span4 offset4">
		<form method="POST">
			<fieldset>
				<legend>Reset Password</legend>
				@if (Session::has('error'))
				{{ trans(Session::get('reason')) }}
				@endif
				<input type="hidden" name="token" value="{{ $token }}">
				<input class="input-block-level" type="text" name="username" placeholder="Username">
				<input class="input-block-level" type="password" name="password" placeholder="New password">
				<input class="input-block-level" type="password" name="password_confirmation" placeholder="Confirm password">
				<button type="submit" class="btn pull-right">Reset Password</button>
			</fieldset>
		</form>
	</div>
</div>
@stop