<?php
include_once 'lib/includes.php';
include_once 'lib/functions/default.php';

if (isset($_POST["username"])) {
	
	debug("trying to log");

	$username = $_POST["username"];
	$password = $_POST["pass"];
	debug("checking login");
	$user = login($username, $password);
	
	if ($user) {

		debug(  "User logged<br/>");
		session_start();
		$_SESSION["user"]=$user;
		
		if (isset($_POST["remember"])) {
			//set session cache not expired
			debug("remember is set - 2 weeks");
			$_SESSION['expire'] = time() + (14 * 24 * 60 * 60);
		}
		
		debug( "And in the session<br/>");
		debug(print_r($_SESSION,true));
		header('Location: /11th/index.php');
	}
}

$page='login';

@include 'template/head.phtml';
$title = "";
@include 'template/top.phtml';

?>


<div class="container login">
    
      <form class="form-signin" role="form" action="login.php" method="POST">
        <h2 class="form-signin-heading">Please log in</h2>
        <input name="username" type="text" class="form-control" placeholder="username" required autofocus>
        <input name="pass" type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input name="remember" type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
      </form>
      
</div>
<?php 
@include 'template/bottom.phtml';
?>