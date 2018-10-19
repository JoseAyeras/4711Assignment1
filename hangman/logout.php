<?php
session_unset();
session_destroy();
redirect('hangman/hangmanGame.html');
?>