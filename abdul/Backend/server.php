<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function requestProcessor($request) {
	echo "Request received".PHP_EOL;

  if(!isset($request['type'])) {
  return "Error: unsupported message type";
}

switch ($request['type']) {

  case "login":
    return doLogin($request['username'], $request['password']);

  case "logout":
    return doLogout($request['username']);

    case "register":
  print_r($request);
  return doRegister($request['username'], $request['password'], $request['name']);
}

// Login function
function doLogin($username, $password) {

	$date = date("Y-m-d");
	$time = date("h:m:sa");

	try {
		$pdo = new PDO('mysql: host=localhost; dbname=it490Proj', "it490", "123456");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		echo "$date, $time: Connected Successsfully".PHP_EOL;
		$log = "$date, $time: Connected Successsfully";

		file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

	} catch (PDOException $e) {
		echo "$date, $time: Connection Failed: ". $e->getMessage();
		$log = "$date, $time: Connection Failed: ". $e->getMessage();

		file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

	}

	$result = $pdo->prepare("SELECT password FROM accounts WHERE username = '{$username}'");

	$result->execute();

	$row = $result->fetchAll();

	if (!empty($row)) {
		if (password_verify($password, $row[0]["password"])) {
			$response = "200";
			$log = "$date $time Response Code 202: Success!";

			$response = $pdo->prepare("SELECT username, name FROM accounts WHERE username = '{$username}'");
			$response->execute();

			$row = $response->fetchAll();
			file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);
			return $row;

		} else {
			$response = '401';
			$log = "$date $time Response Code 401: Username $username, not authorized.";
			file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

		return $response;
		}

	} else {
		$response = "404";
		$log = "$date $time Response Code 404: Username not found.";

		file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);
		return $response;


	}

}

//Logout function
function doLogout($username) {

	$date = date("Y-m-d");
	$time = date("h:m:sa");

	$log = "$date, $time: User has logged out";
	file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

}

// Regester function
function doRegister($username, $password, $name) {

	$date = date("Y-m-d");
	$time = date("h:m:sa");
	$options = ['length' => 11];
	$hash = password_hash($password, PASSWORD_DEFAULT, $options);

	try {
		$pdo = new PDO('mysql: host=localhost; dbname=it490Proj', "it490", "123456");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		echo "$date, $time: Connected Successsfully".PHP_EOL;
		$log = "$date, $time: Connected Successsfully";

		file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

	} catch (PDOException $e) {
		echo "$date, $time: Connection Failed: ". $e->getMessage();
		$log = "$date, $time: Connection Failed: ". $e->getMessage();

		file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

	}


	$result = $pdo->prepare("SELECT * FROM accounts where username = '{$username}'");
	$result->execute();

	$row = $result->fetchAll();

	if (!empty($row)) {
		$response = "302";
		$log = "$date $time Response Code 302: Username $username already registered.";
		file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

		return $response;

	} else {


		$statement = $pdo->prepare("INSERT INTO users (username, password, name) VALUES (:username, :password, :name)");

		$statement->bindParam(":username", $username);
		$statement->bindParam(":password", $hash);
		$statement->bindParam(":name", $name);

		$statement->execute();

		$response = "$username";
		$log = "$date $time Response Code 201: Username $username successfully added to the database.";
		file_put_contents("log.txt", $log.PHP_EOL, FILE_APPEND | LOCK_EX);

		return $response;
		}
	}
}

$server = new rabbitMQServer("testRabbitMQ.ini", "Frontend");
$server->process_requests('requestProcessor');

exit();

?>
