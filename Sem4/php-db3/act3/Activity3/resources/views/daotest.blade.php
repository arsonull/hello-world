@extends('layouts.appmaster')
<html>
	@section('title', 'Login Page')
	<head>
		<title>User Login</title>
	</head>
	@section('content')
	<body>
		<form action="daoTest" method="post">
			<div class="field-column">
				<input type="submit" value="Test DAOs" class="btnLogin">
			</div>
		</form>
	</body>
	@endsection
</html>