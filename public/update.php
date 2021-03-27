<?php

require '../private/autoload.php';

$id = $_POST['id'];
$name = sanitize($_POST['name']);
$phone = sanitize($_POST['phone']);
$email = $_POST['email'];

$query = "UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id=$id";
$result = $db->query($query);
$db->close();

header('location: /dashboard.php');

?>