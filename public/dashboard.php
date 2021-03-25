<?php

include './includes/header.php';

if (!isset($_SESSION['email']) || !$_SESSION['email'])
{
	header('location: /');
	die;
}

?>

<p>Create, Read, Update, and Delete records below:</p>
<div class="row">
	<div class="col-4 offset-4 text-center">
		<a href="/register.php" class="btn btn-sm btn-primary">Register New User</a>
	</div>
	<div class="col-4 text-right">
		<a href="logout.php" class="btn btn-sm bg-up">Logout</a>
	</div>
</div>

<table class="table mt-2">
	<thead>
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>&nbsp;</th>
	</thead>
	<tbody>
		<?php include 'read.php'; ?>
	</tbody>
</table>

<?php include './includes/footer.php'; ?>