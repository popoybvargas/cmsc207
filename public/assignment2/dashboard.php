<?php

include './includes/header.php';

if (!isset($_SESSION['email']) || !$_SESSION['email'])
{
	header('location: /assignment2');
	die;
}

?>

<div class="dashboard">
	<div class="heading">
		<p class="text-center">Create, Read, Update, and Delete records below:</p>
		<div class="box flex">
			<div style="width:33%;"></div>
			<div class="text-center" style="width:34%;">
				<a href="/assignment2/register.php" class="btn btn-sm btn-primary">Register New User</a>
			</div>
			<div class="text-right" style="width:33%;">
				<a href="logout.php" class="btn btn-sm text-tertiary btn-muted">Logout</a>
			</div>
		</div>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php include 'read.php'; ?>
		</tbody>
	</table>
</div>

<script>

const nameInput = document.querySelector('input[name="name"]');

nameInput && nameInput.focus();

</script>

<?php include './includes/footer.php'; ?>