<?php

$Name = "bob";
$Difficulty = "I";
$Score = "10010";
setcookie("name", $Name, time() + 100, "/");
setcookie("difficulty", $Difficulty, time() + 100, "/");
setcookie("score", "$Score", time() + 100, "/");

// $pattern = "/\b($Name)\|($Difficulty)\|\b/i";
// $file = file("../textfile/leaderboard.txt");
// $user = preg_grep($pattern, $file);
// $line_num = array_keys(preg_grep($pattern, $file));

// print_r($user);

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


function update_leaderboard($cookie_name, $cookie_difficulty, $cookie_score, $filepath)
{
    if (isset($cookie_name) and isset($cookie_difficulty) and isset($cookie_score)) {

        // print_r("inside isset");

        // print_r("cookie_username: " . $cookie_name . " cookie_difficulty: " . $cookie_difficulty . " cookie_score: " . $cookie_score);

        $fh = fopen($filepath, 'r+');
        $file = file($filepath);

        $pattern = "/\b($cookie_name)\|($cookie_difficulty)\|\b/i";
        $matches = preg_grep($pattern, $file);
        $line_num = array_keys(preg_grep($pattern, $file));
        $line_num = $line_num[0];

        // string to put username and passwords
        $users = '';

        if (count($matches) > 0) {
            // print_r("more that one match found <br>");
            while (!feof($fh)) {
                $user = explode('|', fgets($fh));

                // take-off old "\r\n"
                $username = trim($user[0]);
                $difficulty = trim($user[1]);
                $score = trim($user[2]);

                // print_r("username: " . $username . " difficulty: " . $difficulty . " score: " . $score);

                // check for empty indexes
                // var_dump(!empty($username) and !empty($difficulty) and !empty($score));
                if (!empty($username) and !empty($difficulty) and !empty($score)) {
                    // print_r("<br>| not empty");
                    if (($username == $cookie_name) and ($difficulty == $cookie_difficulty)) {
                        // print_r("| conditions met");
                        if ((intval($cookie_score) > intval($score))) {
                            $score = $cookie_score;
                        } else {
                            return false;
                        }
                    }

                    $users .= $username . '|' . $difficulty . '|' . $score . "\n";
                    // print_r("users: ", $users);
                    // $users .= "\r\n";
                }
            }

            // using file_put_contents() instead of fwrite()
            file_put_contents('../textfile/leaderboard.txt', $users);
        } else if (count($matches) == 0) {
            // print_r("no matches found");
            $text = "\n" . $cookie_name . '|' . $cookie_difficulty . '|' . $cookie_score;
            file_put_contents('../textfile/leaderboard.txt', $text, FILE_APPEND);
        }
        fclose($fh);
        fclose($file);
        return;
    }
}

function verify_update($cookie_name, $cookie_difficulty, $cookie_score, $filepath)
{
    $file = file($filepath);
    $pattern = "/\b($cookie_name)\|($cookie_difficulty)\|($cookie_score)\b/i";
    $matches = preg_grep($pattern, $file);

    if (count($matches) == 0) {
        print_r("<br><br>match not found<br><br>");
        return false;
    } else {
        print_r("match found");
        return true;
    }
}

print_r("Cookie Value: <br><br>" . $_COOKIE['name'] . " | " . $_COOKIE["difficulty"] . " | " . $_COOKIE['score']);

if (verify_update($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt')) {
    print_r("<br><br>page updated");
} else if (!update_leaderboard($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt')) {
    print_r("cookie value of " . $_COOKIE["score"] . " is less than the original value");
} else if (!verify_update($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt')) {
    print("<br><br>updating...<br><br>");
    update_leaderboard($_COOKIE['name'], $_COOKIE["difficulty"], $_COOKIE['score'], '../textfile/leaderboard.txt');
}



// if (isset($_COOKIE["name"]) and isset($_COOKIE["difficulty"]) and isset($_COOKIE["score"])) {


//     print_r("inside isset");
//     $cookie_name = $_COOKIE["name"];
//     $cookie_difficulty = $_COOKIE["difficulty"];
//     $cookie_score = $_COOKIE["score"];

//     print_r("cookie_username: " . $cookie_name . " cookie_difficulty: " . $cookie_difficulty . " cookie_score: " . $cookie_score);
//     $fh = fopen("../textfile/leaderboard.txt", 'r+');
//     $file = file("../textfile/leaderboard.txt");

//     $pattern = "/\b($cookie_name)\|($cookie_difficulty)\|\b/i";
//     $matches = preg_grep($pattern, $file);
//     $line_num = array_keys(preg_grep($pattern, $file));
//     $line_num = $line_num[0];

//     // string to put username and passwords
//     $users = '';

//     var_dump($matches);
//     var_dump($line_num);

//     if (count($matches) > 0) {
//         $i = 0;
//         print_r("more that one match found");
//         while (!feof($fh)) {
//             if ($line_num == $i) {
//                 print("|| true ||");
//             }
//             $i++;
//             $user = explode('|', fgets($fh));
//             print_r($user);

//             // take-off old "\r\n"
//             $username = trim($user[0]);
//             $difficulty = trim($user[1]);
//             $score = trim($user[2]);

//             print_r("username: " . $username . " difficulty: " . $difficulty . " score: " . $score);

//             // check for empty indexes
//             // var_dump(!empty($username) and !empty($difficulty) and !empty($score));
//             if (!empty($username) and !empty($difficulty) and !empty($score)) {
//                 print_r("<br>| not empty");
//                 if (($username == $cookie_name) and ($difficulty == $cookie_difficulty) and (intval($cookie_score) > intval($score))) {
//                     print_r("| conditions met");
//                     $score = $cookie_score;
//                 }

//                 $users .= $username . '|' . $difficulty . '|' . $score . "\n";
//                 print_r("users: ", $users);
//                 // $users .= "\r\n";
//             }
//         }

//         // using file_put_contents() instead of fwrite()
//         file_put_contents('../textfile/leaderboard.txt', $users);
//     } else if (count($matches) == 0) {
//         print_r("no matches found");
//         $text = $cookie_name . '|' . $cookie_difficulty . '|' . $cookie_score;
//         file_put_contents('../textfile/leaderboard.txt', $text, FILE_APPEND);
//     }
//     fclose($fh);
//     fclose($file);
// }
// print_r("inside isset");
// $cookie_name = $_COOKIE["name"];
// $cookie_score = $_COOKIE["score"];
// $pattern = "/\b($cookie_name)\|\b/i";
// $file = file("../textfile/leaderboard.txt", FILE_IGNORE_NEW_LINES);
// var_dump($file);
// $user_text = preg_grep($pattern, $file);
// $line_num = array_keys(preg_grep($pattern, $file));

// print_r("line_num");
// print_r($line_num[0]);
// $text = $cookie_name . "|" . $cookie_score . "\n";

// print_r(count($user_text));
// if (count($user_text) > 0) {
//     print_r("inside of if");
//     $user_content_text =  explode("|", $user_text[1]);

//     print_r($user_content_text);
//     print_r("text_file: " . intval($user_content_text[1]));
//     print_r("cookies: " . intval($cookie_score));

//     if (intval($user_content_text[1]) < intval($cookie_score)) {
//         print_r("internal if");
//         $user_content_text[1] = $cookie_score;
//         // replace_line($name, $score);
//         $file[$line_num[0]] =  $text;

//         // $serialized_file = serialize($file);
//         file_put_contents('../textfile/leaderboard.txt', print_r($file, TRUE));
//     }
// } else {
//     file_put_contents("../textfile/leaderboard.txt", $text, FILE_APPEND | LOCK_EX);
// }


// function contains($haystack, $needle)
// {
//     return strpos($haystack, $needle) !== false;
// }

// if (isset($_COOKIE["name"]) and isset($_COOKIE["score"])) {
//     $name = ucwords($_COOKIE["name"]);
//     $score = intval($_COOKIE["score"]);
//     $text = '';

//     foreach (file("../textfile/leaderboard.txt") as $line) {
//         print_r("<br><br>");
//         print_r("line" . $line);
//         print_r(contains($line, $name));
//         if (!contains($line, $name)) {
//             print_r("contains_false");
//             $text = $name . "|" . $score . "\n";
//             print_r(" print file_put_contents \n");
//             file_put_contents("../textfile/leaderboard.txt", $text, FILE_APPEND | LOCK_EX);
//             break;
//         } else if (contains($line, $name)) {
//             print_r("contains_true");
//             $contents = explode("|", $line);
//             print_r($contents);
//             print_r(($score > intval($contents[1])) and ($name == $contents[0]));
//             if (($score > intval($contents[1])) and ($name == $contents[0])) {
//                 print_r("strpos_else_greater_than");
//                 //replace score for current user
//                 $text = $name . "|" . $score;
//                 $line = $text;
//                 $replaced = true;
//                 print_r("print fputs \n");
//                 fputs("../textfile/leaderboard.txt", $line);
//                 break;
//             }
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <style>
        * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        ::-webkit-scrollbar {
            width: 0;
            background: transparent;
        }

        body {
            padding: 0px;
            margin: 0px;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
        }

        #Background {
            background-color: #263646;
            margin: 0px;
            width: 100vw;
            height: 100vh;
        }

        #Main-Table {
            width: 100vw;
            height: 100vh;
        }

        .level {
            height: 20px;
            width: auto;
            padding: 2px;
            font-size: 15pt;
            color: #8B948A;
            background-color: #263646;
            border: 0px;
        }

        .level:active {
            color: white;
        }




        /*Flexbox approach*/

        #main-container {
            display: flex;
            align-items: stretch;
            flex-direction: column;
            padding: 30px 20px 20px 20px;
            width: 100vw;
            height: 100vh;
        }

        #top-row {
            display: flex;
            align-items: stretch;
            flex-direction: row;
        }

        #logo-container {
            width: 12%;
            position: relative;
        }

        #logo-container img {
            position: absolute;
            bottom: 0;
            width: 60%;

        }

        #title-container {
            font-size: 50pt;
            color: #C3FF14;
            padding-left: 2%;
            position: relative;
            width: 70%;
        }

        #title-container u {
            position: absolute;
            bottom: 0px;
            font-weight: 900;
        }

        #user-container {
            display: flex;
            color: white;
            font-weight: bold;
            width: 22%;
        }

        #user {
            margin-left: auto;
        }

        #middle-row {
            display: flex;
            padding-left: 13%;
            margin-top: 2%;
        }

        #levels {
            padding-left: 2%;
        }

        .lvl {
            height: 20px;
            width: auto;
            padding: 2px;
            font-size: 15pt;
            color: #8B948A;
            background-color: #263646;
            border: 0px;
        }

        .lvl:active {
            color: white;
        }

        #bottom-row {
            margin-top: 2%;
            display: flex;
            align-content: stretch;
            flex-direction: row;
            height: 79%;
        }

        #play-container {
            display: flex;
            width: 12%;
            justify-content: left;
        }

        #play-container button {
            background-color: #C3FF14;
            border: 0px;
            color: black;
            padding: 0.5%;
            width: 80%;
            height: 8vh;
            border-radius: 8pt;
            font-weight: bold;
            font-size: 12pt;
            -webkit-box-shadow: 3px 3px 4px 1px rgba(0, 0, 0, 0.6);
            box-shadow: 3px 3px 4px 1px rgba(0, 0, 0, 0.6);
        }

        #leaders-container {
            padding-left: 2%;
            height: 100%;
            width: 100%;
            overflow: auto;
        }

        .leader {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: row;
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background-color: #C3FF14;
            color: black;
            padding: 2% 1%;
            -webkit-box-shadow: 3px 3px 4px 1px rgba(0, 0, 0, 0.6);
            box-shadow: 3px 3px 4px 1px rgba(0, 0, 0, 0.6);

        }

        .leader+.leader {
            margin-top: 20px;
        }

        .leader-num {
            width: 12%;
            text-decoration: underline;
            font-weight: bolder;
            font-size: 35pt;
            text-align: center;
        }

        .leader-name {
            width: 70%;
            font-size: 25pt;
            padding: 10px;
            margin-right: auto;
        }

        .leader-time {
            display: flex;
            align-items: center;
            font-size: 25pt;
            width: 18%;
            border-left: 0.15rem solid rgb(88, 88, 88);
            padding-left: 40px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div id="Background">

        <div id="main-container">
            <div id="top-row">
                <div id="logo-container"><img src="../assets/Logo.png" alt="Logo"></div>
                <div id="title-container"><u>LEADERBOARD</u></div>
                <div id="user-container">
                    <h2 id="user">Hi John</h2>
                </div>
            </div>
            <div id="middle-row">
                <div id="levels">
                    <button class="lvl">BEGINNER</button>
                    <button class="lvl">INTERMEDIATE</button>
                    <button class="lvl">EXPERT</button>
                    <button class="lvl">MASTER</button>
                </div>
            </div>
            <div id="bottom-row">
                <div id="play-container">
                    <button id="play-button">
                        PLAY NOW!
                    </button>
                </div>
                <div id="leaders-container">
                    <div class="leader">
                        <div class="leader-num">1</div>
                        <div class="leader-name"><?= $name ?></div>
                        <div class="leader-time"><?= $score ?></div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">2</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">3</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">4</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">5</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">6</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">7</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">8</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">9</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                    <div class="leader">
                        <div class="leader-num">10</div>
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>