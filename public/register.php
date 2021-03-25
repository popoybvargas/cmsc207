<?php

include './includes/header.php';

$error = '';
$name = '';
$phone = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// print_r($_POST);
	$name = sanitize($_POST['name']);
	$phone = sanitize($_POST['phone']);
	$email = $_POST['email'];
	
	$query = "SELECT id FROM users WHERE email='$email'";
	$user = $db->query($query);

	if (mysqli_num_rows($user))
	{
		$error = "Account has already been created for $email";
	}
	elseif (!preg_match("/^[a-zA-Z ]+$/", $_POST['name']))
	{
		$error = 'Invalid name (alpha characters and space only)';
	}
	elseif (!isEmail($email))
	{
		$error = 'Please enter a valid email';
	}
	elseif (!preg_match("/^[a-zA-Z0-9-]+$/", $_POST['password']))
	{
		$error = 'Password may contain alphanumeric and hyphen characters only';
	}
	elseif ($_POST['password'] != $_POST['passwordConfirm'])
	{
		$error = 'Passwords do not match';
	}
	else
	{
		$name = sanitize($_POST['name']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$query = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
		// mysqli_query($db, $query);
		$db->query($query);
		$db->close();

		header('location: /');
		die;
	}
}

?>

<div class="row">
	<div class="card mt-3 col-md-4 offset-md-4 p-0">
		<div class="card-header text-up">
			Signup
		</div>
		<div class="card-body">
			<form class="align-items-center justify-content-center" method="POST">
				<?php

				if (isset($error) && $error != '')
				{
					echo '<div class="col-12">';
					echo "<small class='text-danger'>$error</small>";
					echo '</div>';
				}

				?>
				<div class="col-12">
					<label for="name" class="visually-hidden">Name:</label>
					<input type="text" class="form-control m-2" id="name" name="name" placeholder="Name" value="<?= $name ?>" required>
				</div>
				<div class="col-12">
					<label for="phone" class="visually-hidden">Phone:</label>
					<input type="text" class="form-control m-2" id="phone" name="phone" placeholder="Phone" value="<?= $phone ?>">
				</div>
				<div class="col-12">
					<label for="email" class="visually-hidden">Email:</label>
					<input type="email" class="form-control m-2" id="email" name="email" placeholder="Email" value="<?= $email ?>" required>
				</div>
				<div class="col-12">
					<label for="password" class="visually-hidden">Password:</label>
					<input type="password" class="form-control m-2" id="password" name="password" placeholder="Password" required>
				</div>
				<div class="col-12">
					<label for="passwordConfirm" class="visually-hidden">Confirm Password:</label>
					<input type="password" class="form-control m-2" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm Password" required>
				</div>
				<div class="col-12">
					<button type="submit" class="btn bg-up">Register</button>
				</div>
				<div class="col-12 mt-2">
					<small class="text-muted">Already have an account? <a class="text-muted" href="/">Login</a></small>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include './includes/footer.php'; ?>