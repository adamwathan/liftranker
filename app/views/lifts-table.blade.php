@extends('_layout')

@section('content')
<table class="table table-condensed">
	<thead>
		<tr>
			<th>Rank</th>
			<th>Lifter</th>
			<th>Sex</th>
			<th>Age</th>
			<th>Bodyweight</th>
			<th>Wt. Class</th>
			<th>Squat</th>
			<th>Bench</th>
			<th>Deadlift</th>
			<th>Press</th>
			<th>PL Total</th>
			<th>xBW</th>
			<th>Wilks</th>
			<th>Age Adjusted</th>
		</tr>
	</thead>

	<tbody>
		@foreach($lifters as $lifter)
		<tr>
			<td></td>
			<td>{{{ $lifter->name }}}</td>
			<td>{{{ $lifter->sex }}}</td>
			<td>{{{ $lifter->age }}}</td>
			<td>{{{ $lifter->bodyweight }}}</td>
			<td>{{{ $lifter->weightClass }}}</td>
			<td><a href="{{{ $lifter->squat->evidence }}}">{{{ $lifter->squat }}}</a></td>
			<td><a href="{{{ $lifter->bench->evidence }}}">{{{ $lifter->bench }}}</a></td>
			<td><a href="{{{ $lifter->deadlift->evidence }}}">{{{ $lifter->deadlift }}}</a></td>
			<td><a href="{{{ $lifter->press->evidence }}}">{{{ $lifter->press }}}</a></td>
			<td>{{{ $lifter->total }}}</td>
			<td>{{{ $lifter->bodyweightFactor }}}</td>
			<td>{{{ $lifter->wilks }}}</td>
			<td>{{{ $lifter->ageAdjustedWilks }}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop

@section('scripts')
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$.tablesorter.addWidget({
			id: "numbering",
			format: function(table) {
				var c = table.config;
				$("tr:visible", table.tBodies[0]).each(function(i) {
					$(this).find('td').eq(0).text(i + 1);
				});
			}
		});

	$.tablesorter.addParser({
		id: 'lift', 
		is: function(s) { 
			return false; 
		}, 
		format: function(s) { 
			return parseInt(s.toLowerCase().replace(/[a-z]$/i,'').replace(/\-/,'0'), 10); 
		}, 
		type: 'numeric'
	});

	$("table").tablecloth({
		theme: "stats",
		striped: true,
		condensed: true,
		sortList: [[0,1]]
	});

	$("table").tablesorter({
		widgets: ['numbering'],
		headers: { 
			0: { sorter: false},
			6: { sorter: 'lift'},
			7: { sorter: 'lift'},
			8: { sorter: 'lift'},
			9: { sorter: 'lift'}
		},
		cssHeader: 'headerSortable',
		sortList: [[13,1]]
	});
});
</script>
@stop
