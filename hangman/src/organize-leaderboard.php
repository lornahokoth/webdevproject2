<?php

$Name = "john";
$Difficulty = "e";
$Score = "10025";
setcookie("name", $Name, time() + 100, "/");
setcookie("difficulty", $Difficulty, time() + 100, "/");
setcookie("score", "$Score", time() + 100, "/");

print_r("|" . $Score . "|" . $Name . "|" . $Difficulty . "|<br>");
$pattern = "/\b\|($Score)\|($Name)\|($Difficulty)\|\b/i";
$file = file("../textfile/e-leaderboard.txt");
$user = preg_grep($pattern, $file);
$line_num = array_keys(preg_grep($pattern, $file));

print_r($user);
fclose($file);

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

function correct_file($cookie_name, $cookie_difficulty, $cookie_score)
{
    $difficulty = strtolower($cookie_difficulty);
    if ($difficulty == "b") {
        update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/b-leaderboard.txt");
    }
    if ($difficulty == "i") {
        update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/i-leaderboard.txt");
    }
    if ($difficulty == "e") {
        update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/e-leaderboard.txt");
    }
    if ($difficulty == "m") {
        update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, "../textfile/m-leaderboard.txt");
    }
}


function update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, $filepath)
{
    if (isset($cookie_name) and isset($cookie_difficulty) and isset($cookie_score)) {

        print_r("inside isset<br>");

        print_r("cookie_username: " . $cookie_name . " cookie_difficulty: " . $cookie_difficulty . " cookie_score: " . $cookie_score);

        $filepath = "";

        $difficulty = strtolower($cookie_difficulty);
        if ($difficulty == "b") {
            $filepath = "../textfile/b-leaderboard.txt";
        }
        if ($difficulty == "i") {
            $filepath = "../textfile/i-leaderboard.txt";
        }
        if ($difficulty == "e") {
            $filepath = "../textfile/e-leaderboard.txt";
        }
        if ($difficulty == "m") {
            $filepath = "../textfile/m-leaderboard.txt";
        }
        print_r("<br>" . $filepath);

        $fh = fopen($filepath, 'r+');
        $file = file($filepath);

        $pattern = "/\b\|($cookie_name)\|($cookie_difficulty)\|\b/i";
        $matches = preg_grep($pattern, $file);
        $line_num = array_keys(preg_grep($pattern, $file));
        $line_num = $line_num[0];

        // string to put username and passwords
        $users = '';
        print_r("<br>" . $line_num);
        if (count($matches) > 0) {
            print_r("<br>more that one match found <br>");
            while (!feof($fh)) {
                $user = explode('|', fgets($fh));

                // take-off old "\r\n"
                $username = trim($user[0]);
                $difficulty = trim($user[1]);
                $score = trim($user[2]);

                print_r("<br>line username: " . $username . " difficulty: " . $difficulty . " score: " . $score);

                // check for empty indexes
                // var_dump(!empty($username) and !empty($difficulty) and !empty($score));
                if (!empty($username) and !empty($difficulty) and !empty($score)) {
                    print_r("<br>| not empty");
                    if (($username == $cookie_name) and ($difficulty == $cookie_difficulty)) {
                        print_r("| conditions met");
                        if ((intval($cookie_score) > intval($score))) {
                            $score = $cookie_score;
                        } else {
                            print_r("<br><br>cookie value of " . $_COOKIE["score"] . " is less than the original value<br>");
                        }
                    }

                    $users .= "\n" . $score . '|' . $username . '|' . $difficulty . '|';
                    print_r("<br>users: ", $users);
                    // $users .= "\r\n";
                }
            }

            // using file_put_contents() instead of fwrite()
            // correct_file($cookie_name, $cookie_difficulty, $cookie_score, $filepath);
            // fwrite($fh, $users);
            file_put_contents($filepath, $users);
        } else if (count($matches) == 0) {
            print_r("<br><br>no matches found");
            $text = "\n" . $cookie_score . '|' . $cookie_name . '|' . $cookie_difficulty . '|';
            file_put_contents($filepath, $text, FILE_APPEND);
        }
        fclose($fh);
        fclose($file);
        return;
    }
}

function verify_update($cookie_name, $cookie_difficulty, $cookie_score, $filepath)
{
    $file = file($filepath);
    $pattern = "/\b($cookie_score)\|($cookie_name)\|($cookie_difficulty)\|\b/i";
    $matches = preg_grep($pattern, $file);

    if (count($matches) == 0) {
        print_r("<br>Verify - match not found<br>");
        return false;
    } else {
        print_r("verify - match found");
        return true;
    }
}

// //print current cookie value
// print_r("Cookie Value: <br><br>" . $_COOKIE['name'] . " | " . $_COOKIE["difficulty"] . " | " . $_COOKIE['score']);

// // update_leaderboard($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt');


// //verify that the files are current to the current cookie value
// if (verify_update($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt')) {
//     print_r("<br><br>page updated");
// } else if (!verify_update($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt')) {
//     print("<br><br>updating...<br><br>");
//     update_leaderboard($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt');
// }
