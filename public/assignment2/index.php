<?php

include stream_resolve_include_path('includes/header.php');

if (isset($_SESSION['email']) && $_SESSION['email'])
{
	header('location: /assignment2/dashboard.php');
	die;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// print_r($_POST);
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (!$_POST['g-recaptcha-response'])
	{
		$error = 'Please accomplish reCAPTCHA';
	}
	elseif (!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
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
				header('location: /assignment2/dashboard.php');
				die;
			}
		}
		$error = 'Invalid email or password';
	}
}

?>

<div class="box flex">
	<div class="card">
		<div class="card-header">
			Sign-in
		</div>
		<div class="card-body">
			<div class="message-error text-center <?= (isset($error) && $error != '') ? '' : 'hidden' ?>">
				<small class="text-msg">
					<?= $error; ?>
				</small>
			</div>
			<form method="POST" autocomplete="off">
				<div>
					<input type="email" class="form-input" id="email" name="email" value="<?= isset($email) ? $email : '' ?>" placeholder="Email" required>
				</div>
				<div>
					<input type="password" class="form-input" id="password" name="password" placeholder="Password" required>
				</div>
				<div class="g-recaptcha" data-sitekey="6LfyAKkaAAAAAIuxxQJ0mCFhYw6Td8HyhQtgAn_I"></div>
				<div class="text-center">
					<button type="submit" class="btn btn-secondary btn-login">Login</button>
				</div>
			</form>
			<div class="text-center">
				<small class="text-tertiary text-muted">No account yet? <a href="register.php">Register</a></small>
			</div>
		</div><!-- .card-body -->
	</div><!-- .card -->
</div><!-- .box.flex -->

<?php include './includes/footer.php'; ?>