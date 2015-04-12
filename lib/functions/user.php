<?php

function login($username, $password) {

	debug("user::login-> u=" . $username . "; p=" . $password);

	$user = new Staff();
	$user -> username = $username;
	$user -> password = $password;

	if ($user -> login()) {

		return $user;
	} else {
		debug("User not logged.");
		return false;
	}
}

?>