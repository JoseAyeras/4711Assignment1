<?php
    include '../redirect.php';
    
    if(session_status() !== PHP_SESSION_NONE)
    redirect('hangman/hangmanGame.html');
?>
<html>
  <head>

  </head>
  <body>
    <form action="signup.php" style="border:1px solid #ccc; float: middle">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
    
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="email"><b>Email</b></label>
        <br/>

        <input type="text" placeholder="Enter Username" name="username" required>
        <label for="username"><b>Username</b></label>
        <br/>
        <br/>

        <input type="password" placeholder="Enter Password" name="psw" required>
        <label for="psw"><b>Password</b></label>
        <br/>

        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <br/>
    
        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>
    
        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    
        <div class="clearfix">
          <button type="button" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
    </form>
  </body>
</html>