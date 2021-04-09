@extends('layouts.appmaster')
<html>
	@section('title', 'Login Page')
	<head>
		<title>User Login</title>
	</head>
	@section('content')
	<body>
		<form action="dologin3" method="post">
			{{csrf_field()}}
			<div class="demo-table">
				<div class="form-head">Login</div>
				<div class="field-column">
					<div>
						<label for="username">Username</label><span id="user_info" class="error-info"></span>
						<?php echo $errors->first('username')?>
					</div>
					<div>
						<input name="username" id="username" type="text" class="demo-input-body"/>
					</div>
				</div>
				<div class="field-column">
					<div>
						<label for="password">Password</label><span id="password_info" class="error-info"></span>
						<?php echo $errors->first('password')?>
					</div>
					<div>
						<input name="password" id="password" type="text" class="demo-input-body"/>
					</div>
				</div>
			</div>
			<div class="field-column">
				<input type="submit" class="btnLogin">
			</div>
		</form>
	</body>
	@endsection
</html>