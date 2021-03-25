<?php

$query = 'SELECT * FROM users ORDER BY id DESC';
// $result = $db->query($query);
$result = mysqli_query($db, $query);

while ($row = $result->fetch_assoc())
{
	echo '<tr class="text-center">';
	
	if (isset($_GET['id']) && $row['id'] == $_GET['id'])
	{
		echo '<form class="form-inline m-2" action="update.php" method="POST">';
		echo '<td><input type="text" class="form-control" name="name" value="' . $row['name'] . '"></td>';
		echo '<td><input type="text" class="form-control" name="phone" value="' . $row['phone'] . '"></td>';
		echo '<td><input type="email" class="form-control" name="email" value="' . $row['email'] . '"></td>';
		echo '<td><button type="submit" class="btn btn-sm btn-primary">UPDATE</button></td>';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '</form>';
	}
	else
	{
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['phone'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		echo '<td><a class="text-default fs-6 text-decoration-none" href="/dashboard.php?id=' . $row['id'] . '">UPDATE</a>&emsp;|&emsp;<a class="text-warning fs-6 text-decoration-none" href="/delete.php?id=' . $row['id'] . '">DELETE</a></td>';
	}
	echo '</tr>';
}

$db->close();

?>