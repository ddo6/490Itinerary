<?php

session_start();

require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');

$client = new rabbitMQClient("../testRabbitMQ.ini", "Frontend");
$date = date("Y-m-d", time());


$username = htmlspecialchars($_POST['username']);
$password =  htmlspecialchars($_POST['password']);
$error = '';

if (isset($_POST['register'])) {
	header('Location: ../view/register.view.php');


} elseif (isset($_POST['login'])) {

	if (empty($username) || empty($password)) {
		$error = "Oops! Invalid Username/Password";
		require '../view/index.view.php';

	} else {
		$request = array();
		$request['type'] = "login";
		$request['username'] = $username;
		$request['password'] = $password;
		$request['message'] = "'{$username}' requests to login '{$date}'";

		$response = $client->send_request($request);

		if ($response === '401') {
			$error = "Oops! Invalid Username/Password";
			require '../view/index.view.php';

		} elseif ($response === '404') {
			$error = "Oops! Username not found!";
			require '../view/index.view.php';

		} else {
			$_SESSION['username'] = $response[0]['username'];
			$_SESSION['name'] = $response[0]['name'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
			header("Location: ../script/profile.php");
			exit();

		}
	}
}


?>
