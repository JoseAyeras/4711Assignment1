<?php
//session_start();
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

//if(isset($_SESSION['username']))
    if(session_status() !== PHP_SESSION_NONE)
    redirect('hangman/hangmanGame.html');
?>
<html>
<head></head>
<body>
<a href="login/">Login</a>
<a href="signup/">Sign Up</a>
</body>
</html>