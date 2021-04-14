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

	if (!$_POST['g-recaptcha-response'])
	{
		$error = 'Please accomplish reCAPTCHA';
	}
	elseif (mysqli_num_rows($user))
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

		header('location: /assignment2');
		die;
	}
}

?>

<div class="box flex">
	<div class="card">
		<div class="card-header text-up">
			Signup
		</div>
		<div class="card-body text-center">
			<div class="message-error text-center <?php if (isset($error) && $error != '') { echo ''; } else { echo 'hidden'; } ?>">
				<small class="text-msg">
					<?= $error; ?>
				</small>
			</div>
			<form method="POST" autocomplete="off">
				<div>
					<input type="text" class="form-input" id="name" name="name" placeholder="Name" value="<?= $name ?>" required>
				</div>
				<div>
					<input type="text" class="form-input" id="phone" name="phone" placeholder="Phone" value="<?= $phone ?>" maxlength=15>
				</div>
				<div>
					<input type="email" class="form-input" id="email" name="email" placeholder="Email" value="<?= $email ?>" required>
				</div>
				<div>
					<input type="password" class="form-input" id="password" name="password" placeholder="Password" required>
				</div>
				<div>
					<input type="password" class="form-input" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm Password" required>
				</div>
				<div class="g-recaptcha" data-sitekey="6LfyAKkaAAAAAIuxxQJ0mCFhYw6Td8HyhQtgAn_I"></div>
				<div>
					<button type="submit" class="btn btn-secondary btn-register">Register</button>
				</div>
			</form>
			<div class="text-center">
				<small class="text-muted">Already have an account? <a class="text-muted" href="/assignment2">Login</a></small>
			</div>
		</div>
	</div>
</div>

<script>

const validChars = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', '(', ')', ' ', 'Backspace', 'ArrowLeft', 'ArrowRight' ];

document.getElementById('phone').addEventListener('keydown', e =>
{
	if (!validChars.includes(e.key)) e.returnValue = false;
});

</script>

<?php include './includes/footer.php'; ?>