<html>
	<head>
		<title>User Login</title>
	</head>
	<body>
		<form action="formPost" method="post">
			{{csrf_field()}}
			<div class="demo-table">
				<div class="form-head">Questionnaire</div>
				<div class="field-column">
					<div>
						<label for="username">Favorite Food</label><span id="food" class="error-info"></span>
					</div>
					<div>
						<input name="food" id="food" type="text" class="demo-input-body"/>
					</div>
				</div>
				<div class="field-column">
					<div>
						<label for="password">Favorite Color</label><span id="color" class="error-info"></span>
					</div>
					<div>
						<input name="color" id="color" type="text" class="demo-input-body"/>
					</div>
				</div>
				<div class="field-column">
					<div>
						<label for="password">Favorite Movie</label><span id="movie" class="error-info"></span>
					</div>
					<div>
						<input name="movie" id="movie" type="text" class="demo-input-body"/>
					</div>
				</div>
				<div class="field-column">
					<div>
						<label for="password">Favorite Book</label><span id="book" class="error-info"></span>
					</div>
					<div>
						<input name="book" id="book" type="text" class="demo-input-body"/>
					</div>
				</div>
			</div>
			<div class="field-column">
				<input type="submit" class="btnLogin">
			</div>
		</form>
	</body>
</html>