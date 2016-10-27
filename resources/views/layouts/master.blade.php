<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Tokri | Question Bank</title>
	<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			{{ link_to_route('root','Question Bank',null,array('class' => 'navbar-brand')) }}
		</div>
		<ul class="navbar-nav nav navbar-right">
				<li>{{ link_to_route('question.create', 'Add Question') }}</li>
		</ul>
	</div>
</nav>
<div class="container">
	@yield('content')
</div>
</body>
</html>
