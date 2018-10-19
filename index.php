<?php

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

if($_SESSION['username'] !== NULL)
    redirect('hangman/hangmanGame.html');
?>
<html>
<head></head>
<body>
<a href="/login/login.php">Login</a>
<a href="/signup/signup.php">Sign Up</a>
</body>
</html>