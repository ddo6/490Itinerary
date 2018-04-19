<?php

require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');

$client = new rabbitMQClient("../testRabbitMQ.ini", "Frontend");

$date = date("Y-m-d", time());

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirmPassword']);
$name = htmlspecialchars($_POST['name']);


$missingError = '';
$validateError = '';

if (isset($_POST['register'])) {

	if ((empty($username)) or ((empty($password))) or ((empty($name))) ) {
		$missingError = "Oops! You are missing some fields.";

		if ($confirmPassword != $password) {
			$validateError = "Oops! Password did not match.";

		}

		require '../view/register.view.php';

	}  else {

		$request = array();
		$request['type'] = "register";
		$request['username'] = $username;
		$request['password'] = $password;
		$request['name'] = $name;
		$request['message'] = "'{$username}' has been registered '{$date}'";

		$response = $client->send_request($request);

		require "../view/index.view.php";

	}
}


?>
