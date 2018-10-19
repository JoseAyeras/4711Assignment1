<?php
session_start();
    $words = ["quick", "brown", "fox", "jumped",
                "over", "the", "lazy", "dog"];
    $choice = rand(0, 7);
    $_SESSION['word'] = $words[$choice];
    $returnObject = array(
        "size" => sizeof(str_split($_SESSION['word'])),
        "lives" => 7,
    );
    $returnJSON = json_encode($returnObject);
    //echo $returnObject;
    return $returnJSON;
        //$returnObject;
?>
<html>
    <head></head>
    <body>
        <a href="hangWord.php">You're in the wrong place.</a>
    </body>
</html>