<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CMSC 207</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<h1>CRUD with PHP & MySQL</h1>
	<p>Create, Read, Update, and Delete records below:</p>

	<form action="create.php" class="form-inline m-2" method="POST">
		<label for="name">Name:</label>
		<input type="text" class="form-control m-2" id="name" name="name">
		
		<label for="phone">Phone:</label>
		<input type="text" class="form-control m-2" id="phone" name="phone">

		<label for="email">Email:</label>
		<input type="text" class="form-control m-2" id="email" name="email">

		<button type="submit" class="btn btn-primary">Add</button>
	</form>
</body>
</html>