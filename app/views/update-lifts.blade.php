@extends('_layout')

@section('content')
<form method="POST">
	<fieldset>
		<legend>Update Lifts</legend>
		<p>Update one or more lifts by filling in the following fields. Any lifts you don't want to update can be left blank.</p>
		<div class="alert alert-info"><strong>Note!</strong> All entries should be made in pounds!</div>
		<div class="row-fluid">
			<div class="span3">
				<fieldset class="lift-data">
					<legend>Squat</legend>
					<label>
						<input class="input-block-level" type="text" placeholder="Weight Lifted" name="squatWeightLifted">
					</label>
					{{ $errors->first('squatWeightLifted', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Bodyweight" name="squatBodyweight">
					</label>
					{{ $errors->first('squatBodyweight', '<small class="error">:message</small>')}}
					<label>
						<select name="squatVariation">
							@foreach($squatVariations as $value => $name)
							<option value="{{ $value }}">{{ $name }}</option>
							@endforeach
						</select>
					</label>
					{{ $errors->first('squatVariation', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="date" placeholder="Date Performed" name="squatDatePerformed">
					</label>
					{{ $errors->first('squatDatePerformed', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Link to log/video" name="squatEvidence">
					</label>
					{{ $errors->first('squatEvidence', '<small class="error">:message</small>')}}
				</fieldset>
			</div>
			<div class="span3">
				<fieldset class="lift-data">
					<legend>Bench</legend>
					<label>
						<input class="input-block-level" type="text" placeholder="Weight Lifted" name="benchWeightLifted">
					</label>
					{{ $errors->first('benchWeightLifted', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Bodyweight" name="benchBodyweight">
					</label>
					{{ $errors->first('benchBodyweight', '<small class="error">:message</small>')}}
					<label>
						<select name="benchVariation">
							@foreach($benchVariations as $value => $name)
							<option value="{{ $value }}">{{ $name }}</option>
							@endforeach
						</select>
					</label>
					{{ $errors->first('benchVariation', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="date" placeholder="Date Performed" name="benchDatePerformed">
					</label>
					{{ $errors->first('benchDatePerformed', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Link to log/video" name="benchEvidence">
					</label>
					{{ $errors->first('benchEvidence', '<small class="error">:message</small>')}}
				</fieldset>
			</div>
			<div class="span3">
				<fieldset class="lift-data">
					<legend>Deadlift</legend>
					<label>
						<input class="input-block-level" type="text" placeholder="Weight Lifted" name="deadliftWeightLifted">
					</label>
					{{ $errors->first('deadliftWeightLifted', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Bodyweight" name="deadliftBodyweight">
					</label>
					{{ $errors->first('deadliftBodyweight', '<small class="error">:message</small>')}}
					<label>
						<select name="deadliftVariation">
							@foreach($deadliftVariations as $value => $name)
							<option value="{{ $value }}">{{ $name }}</option>
							@endforeach
						</select>
					</label>
					{{ $errors->first('deadliftVariation', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="date" placeholder="Date Performed" name="deadliftDatePerformed">
					</label>
					{{ $errors->first('deadliftDatePerformed', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Link to log/video" name="deadliftEvidence">
					</label>
					{{ $errors->first('deadliftEvidence', '<small class="error">:message</small>')}}
				</fieldset>
			</div>
			<div class="span3">
				<fieldset class="lift-data">
					<legend>Press</legend>
					<label>
						<input class="input-block-level" type="text" placeholder="Weight Lifted" name="pressWeightLifted">
					</label>
					{{ $errors->first('pressWeightLifted', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Bodyweight" name="pressBodyweight">
					</label>
					{{ $errors->first('pressBodyweight', '<small class="error">:message</small>')}}
					<label>
						<select name="pressVariation">
							@foreach($pressVariations as $value => $name)
							<option value="{{ $value }}">{{ $name }}</option>
							@endforeach
						</select>
					</label>
					{{ $errors->first('pressVariation', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="date" placeholder="Date Performed" name="pressDatePerformed">
					</label>
					{{ $errors->first('pressDatePerformed', '<small class="error">:message</small>')}}
					<label>
						<input class="input-block-level" type="text" placeholder="Link to log/video" name="pressEvidence">
					</label>
					{{ $errors->first('pressEvidence', '<small class="error">:message</small>')}}
				</fieldset>
			</div>
			<button type="submit" class="btn pull-right">Submit Lifts</button>
		</div>
	</fieldset>
</form>
@stop