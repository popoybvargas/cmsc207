<?php

include './includes/header.php';

if (isset($_SESSION['email']) && $_SESSION['email'])
{
	header('location: /dashboard.php');
	die;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// print_r($_POST);
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
	{
		$error = 'Please enter a valid email';
	}
	else
	{

		$query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		$result = $db->query($query);
		$db->close();
		
		foreach ($result as $user)
		{
			if (password_verify($password, $user['password']))
			{
				$_SESSION['email'] = $user['email'];
				header('location: /dashboard.php');
				die;
			}
		}
		$error = 'Invalid email or password';
	}
}

?>

<div class="row">
	<div class="card mt-3 col-md-4 offset-md-4 p-0">
		<div class="card-header text-up">
			Sign-in
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
					<label for="email" class="visually-hidden">Email:</label>
					<input type="email" class="form-control m-2" id="email" name="email" placeholder="Email" required>
				</div>
				<div class="col-12">
					<label for="password" class="visually-hidden">Password:</label>
					<input type="password" class="form-control m-2" id="password" name="password" placeholder="Password" required>
				</div>
				<div class="col-12">
					<button type="submit" class="btn bg-up">Login</button>
				</div>
				<div class="col-12 mt-2">
					<small class="text-muted">No account yet? <a class="text-muted" href="register.php">Register</a></small>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include './includes/footer.php'; ?>