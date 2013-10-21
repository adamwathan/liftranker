@extends('_layout')

@section('content')
<div class="row-fluid">
	<div class="span4 offset4">
		<form method="POST">
			<fieldset>
				<legend>Register</legend>
				@if (! $errors->isEmpty())
				<ul>
					@foreach($errors->all() as $error)
					<li class="error">{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				<label>
					<input class="input-block-level" type="text" placeholder="Username" name="username">
				</label>
				<label>
					<input class="input-block-level" type="password" placeholder="Password" name="password">
				</label>
				Date of Birth
				<div class="row-fluid">
					<div class="span3">
						<select name="day" class="input-block-level">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
					</div>
					<div class="span5">
						<select name="month" class="input-block-level">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</div>
					<div class="span4">
						<select name="year" class="input-block-level">
							<?php for ($i= (date('Y') - 100); $i <= date('Y'); $i++): ?>
							<option value="{{ $i }}">{{ $i }}</option>
						<?php endfor; ?>
					</select>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<label class="radio">
						<input type="radio" name="gender" value="1" checked>
						Male
					</label>
				</div>
				<div class="span4">
					<label class="radio">
						<input type="radio" name="gender" value="2">
						Female
					</label>
				</div>
			</div>
			<label>
				<input class="input-block-level" type="text" placeholder="Email (for password resets only)" name="email">
			</label>
			<button type="submit" class="btn pull-right">Register</button>
		</fieldset>
	</form>
</div>
</div>
@stop