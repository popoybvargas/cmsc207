<?php

function getRandomString($maxLength)
{
	$array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	$text = '';

	$minLength = 4;
	$maxLength = $maxLength > $minLength ? $maxLength : 4;
	$length = rand($minLength, $maxLength);

	for ($i = 0; $i < $length; $i++)
	{
		$random = rand(0, count($array) - 1);
		$text .= $array[$random];
	}

	return $text;
}

function sanitize($string)
{
	return addslashes(trim($string));
}

function isEmail($email)
{
	return preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email);
}

function logout()
{
	session_unset();
	session_destroy();
	header('location: /assignment2');
	die;
}

?>