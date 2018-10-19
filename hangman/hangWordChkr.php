<html>
    <head></head>
    <body>
        <a href="hangWord.php">You're in the wrong place.</a>
    </body>
</html>
<?php
    $a = $_GET['guess'];
    $word = str_split($_SESSION['start']);
    $letter = $word[0];
    $count = 0;
    for($b=0; $b<sizeof($word); ++$b){
        $letter = $word[$b];
        if ($letter === $a){
            $_SESSION['completed'][$b] = $letter;
            ++$count;
        }
    }
    if ($count === 0)
        return json_encode(0);
    else return json_encode($_SESSION['completed']);

?>