<?php

include './db';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$query = "INSERT INTO users (name, phone, email) VALUES ('$name', '$phone', '$email')";
$conn->query($query);

header('location: index.php');

?>