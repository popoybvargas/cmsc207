<?php

$query = 'SELECT * FROM users ORDER BY id DESC';
// $result = $db->query($query);
$result = mysqli_query($db, $query);

while ($row = $result->fetch_assoc())
{
	echo '<tr class="text-center">';
	
	if (isset($_GET['id']) && $row['id'] == $_GET['id'])
	{
		echo '<form action="update.php" method="POST">';
		echo '<td><input type="text" class="form-input-sm" name="name" value="' . $row['name'] . '"></td>';
		echo '<td><input type="text" class="form-input-sm" name="phone" value="' . $row['phone'] . '"></td>';
		echo '<td><input type="email" class="form-input-sm" name="email" value="' . $row['email'] . '"></td>';
		echo '<td><button type="submit" class="btn btn-xs btn-secondary">UPDATE</button></td>';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '</form>';
	}
	else
	{
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['phone'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		echo '<td><a href="/assignment2/dashboard.php?id=' . $row['id'] . '" class="text-secondary">UPDATE</a>&emsp;|&emsp;<a href="/assignment2/delete.php?id=' . $row['id'] . '" class="text-tertiary text-muted">DELETE</a></td>';
	}
	echo '</tr>';
}

$db->close();

?>