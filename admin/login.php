<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style/pure/pure-min.css">
  <link rel="stylesheet" href="../style/pure/forms-min.css">
</head>
<body>

<div id="login">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>
	</br>
	</br>
	</br>
	</br>
	<form class="pure-form pure-form-aligned" action="" method="post" align="center">
		<fieldset>
        <div class="pure-control-group">
            <label for="name">Username</label>
            <input name="username" id="name" type="text" placeholder="Username">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input name="password" id="password" type="password" placeholder="Password">
        </div>
        <div class="pure-controls">
        	<button type="submit" name="submit" class="pure-button pure-button-primary">Submit</button>
		</div>
		</fieldset>
	</form>

</div>
</body>
</html>
