<?php
if (isset($_POST['guess'])) {
    $data = strtoupper($_POST['guess']);
    $word = strtoupper($_COOKIE['word']);
    $repeat = false;

    if (isset($_COOKIE['history'])) {
        $history = json_decode($_COOKIE['history'], true); //gets contents of history cookies and converts it to an array.
    } else {
        $history = array(); //if no history, creates empty array.
    }
    if (strlen($data) == 1) {
        if (!in_array($data, $history)) { // if data not found in history
            $history[] = $data; //adds the latest guess to the end of the history array.
            setcookie("history", json_encode($history)); //sets the cookie   

            $display = $_COOKIE['display'];
            for ($i = 0; $i < strlen($word); $i++) {
                if ($data == $word[$i]) {
                    $display[$i] = $data;
                    setcookie("display", $display);
                }
            }
        } else {
            $repeat = true; //repeat is to notify user "You've guessed this letter" ; not in use yet.
        }
    } else {
        if($data == $word) {
            //end timer
            //redirect to congrats page
            
        } else {
            //display hangman bodypart
        }
    }
} else { //runs when its a new game
    
    //start timer code
    
    /* random word and hint generated from text file */
    $rand = '../textfile/star-wars.txt';
    $fop = fopen($rand, 'a+');
    $f_contents = file($rand);
    $info = $f_contents[rand(0, count($f_contents) - 1)];
    $line = explode(",", $info);
    $word = $line[0];
    $hint = $line[1];

    setcookie("word", $word);
    setcookie("hint", $hint);
    setcookie("history", "");

    $pattern = '/[A-Za-z]/';
    $display = preg_replace($pattern, '_', $word);

    setcookie("display", $display);
}

header("Location:https://codd.cs.gsu.edu/~lokoth1/PW/hangman/src/maingame.php");
die();
