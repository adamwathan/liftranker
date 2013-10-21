<!doctype html>
<html>
<head>
	<title>Starting Strength Forum Rankings</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/tablecloth.css">
	<link rel="stylesheet" href="/css/prettify.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="pull-right">
				@if(Auth::check())
				<ul class="nav nav-pills">
					<li class="disabled"><a>Welcome, {{Auth::user()->username}}</a></li>
					<li>
						<a href="/">Home</a>
					</li>
					<li>
						<a href="/update-lifts">Update Lifts</a>
					</li>
					<li>
						<a href="/logout">Logout</a>
					</li>
				</ul>
				@else
				<ul class="nav nav-pills">
					<li><a href="/login">Login</a></li>
					<li class="disabled">
						<a>or</a>
					</li>
					<li>
						<a href="/register">Register</a>
					</li>
				</ul>
				@endif


			</div>
			<h1 class="logo"><a href="/">Starting Strength Forum Rankings</a></h1>
		</div>
		<div class="body">
			@yield('content')
		</div>
	</div>
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.metadata.js"></script>
	<script src="/js/jquery.tablesorter.min.js"></script>
	<script src="/js/jquery.tablecloth.js"></script>
	<script>
	(function($) {
		$.fn.placeholder = function() {
			if(typeof document.createElement("input").placeholder == 'undefined') {
				$('[placeholder]').focus(function() {
					var input = $(this);
					if (input.val() == input.attr('placeholder')) {
						input.val('');
						input.removeClass('placeholder');
					}
				}).blur(function() {
					var input = $(this);
					if (input.val() == '' || input.val() == input.attr('placeholder')) {
						input.addClass('placeholder');
						input.val(input.attr('placeholder'));
					}
				}).blur().parents('form').submit(function() {
					$(this).find('[placeholder]').each(function() {
						var input = $(this);
						if (input.val() == input.attr('placeholder')) {
							input.val('');
						}
					})
				});
			}
		}
		$.fn.placeholder();
	})(jQuery);
	</script>

	@yield('scripts')

</body>
</html>
