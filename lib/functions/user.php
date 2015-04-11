<?php

function login($username, $password) {

	debug("user::login-> u=" . $username . "; p=" . $password);

	$user = new User();
	$user -> username = $username;
	$user -> password = $password;

	if ($user -> login()) {

		return $user;
	} else {
		debug("User not logged.");
		return false;
	}
}

function register($user) {
	$register_success = false;

	$error_name = false;
	$error_email = false;
	$error_password = false;
	$error_timezone = false;
	$error_captcha = false;
	$error_already = false;

	$u = new User();

	if (isset($_POST["register"])) {
		$register_success = true;
		//phpinfo();

		if (!isset($_POST["name"]) || strlen($_POST["name"]) < 2) {
			$error_name = true;
			$register_success = false;

		}
		if (isset($_POST["name"]))
			$u -> name = $_POST["name"];

		if (!isset($_POST["mail"]) || strlen($_POST["mail"]) < 4) {
			$error_email = true;
			$register_success = false;
		}
		if (isset($_POST["mail"]))
			$u -> email = $_POST["mail"];

		if (isset($_POST["mail"]))
			$u -> username = $_POST["mail"];

		if (!isset($_POST["pass"]) || strlen($_POST["pass"]) < 6) {
			$error_password = true;
			$register_success = false;
		}

		if (isset($_POST["pass"]))
			$u -> password = $_POST["pass"];

		$u -> timezone = $_POST["timezone"];

		if (!isset($_POST["captcha"]) || ($_POST["captcha"] != 4)) {
			$error_captcha = true;
			$register_success = false;
		}

		debug("CAPTCHA:" . $_POST["captcha"]);

		if ($register_success) {
			$register_success = $u -> save();
			debug("Registered::" . $register_success);
			if (!$register_success) {
				$error_email = true;
				$error_already = true;
			}
		}

	}

}
?>