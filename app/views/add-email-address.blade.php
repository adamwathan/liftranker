@extends('_layout')

@section('content')
<div class="row-fluid">
	<div class="span4 offset4">
		<form method="POST">
			<fieldset>
				<legend>Add an email address</legend>
				<div class="alert alert-info">
					<p>Hey <strong>{{ Auth::user()->username }}</strong>, it looks like we don't have your email address on file.</p>
					<p>Please add an email address to your account so we can reset your password if you ever forget it!</p>
				</div>
				{{ $errors->first('email', '<div class="alert alert-error">:message</div>') }}
				<label><input class="input-block-level" type="text" placeholder="Email" name="email"></label>
				<button type="submit" class="btn pull-right">Add Email</button>
			</fieldset>
		</form>
	</div>
</div>
@stop