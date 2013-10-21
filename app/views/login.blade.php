@extends('_layout')

@section('content')
<div class="row-fluid">
	<div class="span4 offset4">
		<form method="POST">
			<fieldset>
				<legend>Login</legend>
				{{ $errors->first('login', '<div class="alert alert-error">:message</div>') }}
				<label><input class="input-block-level" type="text" placeholder="Username" name="username"></label>
				<label><input class="input-block-level" type="password" placeholder="Password" name="password"></label>
				<button type="submit" class="btn pull-right">Login</button>
				<a class="pull-left" href="/forgot-password">Forgot your password?</a>
			</fieldset>
		</form>
	</div>
</div>
@stop