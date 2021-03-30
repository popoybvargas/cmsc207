<?php

require 'private/autoload.php';

$id = $_GET['id'];
$query = "SELECT email FROM users WHERE id=$id LIMIT 1";
$userToDelete = $db->query($query);

$query = "DELETE FROM users WHERE id=$id";

if ($db->query($query))
{
	foreach ($userToDelete as $user)
	{
		if ($user['email'] == $_SESSION['email'])
		{
			logout();
			die;
		}
	}

	$query = "SELECT * FROM users LIMIT 1";
	$users = $db->query($query);
	$db->close();

	if (!mysqli_num_rows($users))
	{
		logout();
		die;
	}
}

header('location: /assignment2/dashboard.php');

?>