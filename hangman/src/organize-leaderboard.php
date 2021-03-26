<?php

if (!empty($_COOKIE['name'])) {
    $fileName = "";
    if ($_COOKIE['difficulty'] == 'Beginner') {
        $fileName = "../textfile/b-leaderboard.txt";
    } else if ($_COOKIE['difficulty'] == 'Intermediate') {
        $fileName = "../textfile/i-leaderboard.txt";
    } else if ($_COOKIE['difficulty'] == 'Expert') {
        $fileName = "../textfile/e-leaderboard.txt";
    } else if ($_COOKIE['difficulty'] == 'Master') {
        $fileName = "../textfile/m-leaderboard.txt";
    }
    if (file_exists($fileName)) {
        print_r("inside if");
        chmod($fileName, 0777);
    } else {
        print_r("inside else");
        $file = fopen($fileName, "w");
        fclose($file);
        chmod($fileName, 0777);
    }
    $line = $_COOKIE['name'] . "|" . $_COOKIE['time_elapsed'] . PHP_EOL;
    file_put_contents($fileName, $line, FILE_APPEND);
    shell_exec("sort -t'|' -nk2 $fileName | head -10 > ../textfile/test.out");
    shell_exec("mv ../textfile/test.out $fileName");
    chmod($fileName, 0777);
}

// $Name = "steve";
// $Difficulty = "Beginner";
// $time = "10027";
// setcookie("name", $Name, time() + 100, "/");
// setcookie("difficulty", $Difficulty, time() + 100, "/");
// setcookie("time_elapsed", "$time", time() + 100, "/");

// print_r($Score . "|" . $Name . "|" . $Difficulty . "|<br>");
// $pattern = "/($Score)\|($Name)\|($Difficulty)\|/i";
// $file = file("../textfile/b-leaderboard.txt");
// $user = preg_grep($pattern, $file);
// $line_num = array_keys(preg_grep($pattern, $file));

// print_r($user);
// print_r($file);
// fclose($file);

// function replace_line($usr_name, $usr_score)
// {
//     $pattern = "/\b($usr_name)\|\b/i"; // user to find line that contains the defined name;
//     $file = file("../textfile/leaderboard.txt");
//     $replace = $usr_name . "|" . $usr_score;
//     preg_replace($pattern, $replace, $file);
//     return;
// }

// function update_file($file)
// {
//     foreach ($file as $line) {
//         file_put_contents("../textfile/leaderboard.txt", $line);
//     }
//     return;
// }

// function replace_line($line_num, $file, $replacement_text)
// { }

// function correct_file($cookie_name, $cookie_difficulty, $cookie_score)
// {
//     $difficulty = strtolower($cookie_difficulty);
//     if ($difficulty == "b") {
//         update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/b-leaderboard.txt");
//     }
//     if ($difficulty == "i") {
//         update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/i-leaderboard.txt");
//     }
//     if ($difficulty == "e") {
//         update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/e-leaderboard.txt");
//     }
//     if ($difficulty == "m") {
//         update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/m-leaderboard.txt");
//     }
// }


// function update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, $filepath)
// {
//     if (isset($cookie_name) and isset($cookie_difficulty) and isset($cookie_score)) {

//         print_r("inside isset<br>");

//         print_r("cookie_username: " . $cookie_name . " cookie_difficulty: " . $cookie_difficulty . " cookie_score: " . $cookie_score);

//         $filepath = "";

//         $difficulty = strtolower($cookie_difficulty);

//         if ($difficulty == "Beginner") {
//             $filepath = "../textfile/b-leaderboard.txt";
//         }
//         if ($difficulty == "Intermediate") {
//             $filepath = "../textfile/i-leaderboard.txt";
//         }
//         if ($difficulty == "Expert") {
//             $filepath = "../textfile/e-leaderboard.txt";
//         }
//         if ($difficulty == "Master") {
//             $filepath = "../textfile/m-leaderboard.txt";
//         }
//         print_r("<br><br>filepath: " . $filepath);

//         $fh = fopen($filepath, 'r+');
//         $file = file($filepath);

//         $pattern = "/($cookie_name)\|/i";
//         $matches = preg_grep($pattern, $file);
//         $line_num = array_keys(preg_grep($pattern, $file));
//         $line_num = $line_num[0];

//         // string to put username and passwords
//         $users = '';
//         print_r("<br> Line Num: " . $line_num);
//         print_r("<br> matches: " . $matches);
//         if (count($matches) > 0) {
//             print_r("<br>more that one match found <br>");
//             while (!feof($fh)) {
//                 $user = explode('|', fgets($fh));

//                 // take-off old "\r\n"
//                 $username = trim($user[1]);
//                 $difficulty = trim($user[2]);
//                 $score = trim($user[0]);

//                 print_r("<br>line username: " . $username . " difficulty: " . $difficulty . " score: " . $score);

//                 // check for empty indexes
//                 // var_dump(!empty($username) and !empty($difficulty) and !empty($score));
//                 if (!empty($username) and !empty($difficulty) and !empty($score)) {
//                     print_r("<br>| not empty");
//                     if (($username == $cookie_name) and ($difficulty == $cookie_difficulty)) {
//                         print_r("| conditions met");
//                         if ((intval($cookie_score) > intval($score))) {
//                             print_r("<br><br>Replacing score for " . $username . " from: " . $score . " to: " . $cookie_score . "<br><br>");
//                             $score = $cookie_score;
//                         } else {
//                             print_r("<br><br>cookie value of " . $_COOKIE["score"] . " is less than the original value<br>");
//                         }
//                     }

//                     $users .=  $username . '|' . $score . PHP_EOL;
//                     print_r("<br>users: ", $users);
//                     // $users .= "\r\n";
//                 }
//             }

//             // using file_put_contents() instead of fwrite()
//             // correct_file($cookie_name, $cookie_difficulty, $cookie_score, $filepath);
//             // fwrite($fh, $users);
//             file_put_contents($filepath, $users);
//         } else if (count($matches) == 0) {
//             print_r("<br><br>no matches found | adding the following cookie <br><br>");
//             $text = $cookie_score . '|' . $cookie_name . '|' . $cookie_difficulty . '|';
//             print_r("$text");
//             file_put_contents($filepath, $text, FILE_APPEND);
//         }

//         chmod($filepath, 0777);
//         shell_exec("sort -t'|' -nk2 $filepath | head -10 > ../textfile/test.out");
//         shell_exec("mv ../textfile/test.out $filepath");
//         fclose($fh);
//         fclose($file);
//         return;
//     }
// }

// function verify_update($cookie_name, $cookie_difficulty, $cookie_score, $filepath)
// {
//     $file = file($filepath);
//     $pattern = "/($cookie_score)\|($cookie_name)\|($cookie_difficulty)\|/i";
//     $matches = preg_grep($pattern, $file);

//     print_r("matches -- verify <br>");
//     print_r($matches);

//     if (count($matches) == 0) {
//         print_r("<br>Verify - match not found<br>");
//         return false;
//     } else {
//         print_r("verify - match found");
//         return true;
//     }
// }

// // print current cookie value
// print_r("Cookie Value: " . $_COOKIE['score'] . "|" . $_COOKIE['name'] . " | " . $_COOKIE["difficulty"] . " | ");

// update_leaderboard($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt');


// // verify that the files are current to the current cookie value
// if (verify_update($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt')) {
//     print_r("<br><br>page updated");
// } else {
//     print("<br><br>updating...<br><br>");
//     update_leaderboard($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt');
// }
