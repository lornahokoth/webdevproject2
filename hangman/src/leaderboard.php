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
            cursor: pointer;
        }

        .lvl-active {
            height: 20px;
            width: auto;
            padding: 2px;
            font-size: 15pt;
            background-color: #263646;
            border: 0px;
            color: white;
            cursor: pointer;
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
            width: 60%;
            font-size: 25pt;
            padding: 10px;
            margin-right: auto;
        }

        .leader-time {
            display: flex;
            align-items: center;
            font-size: 25pt;
            width: 25%;
            border-left: 0.15rem solid rgb(88, 88, 88);
            padding-left: 40px;
            height: 50px;
        }
    </style>
</head>

<?php
include "debug.php";
$class_b = "lvl";
$class_i = "lvl";
$class_e = "lvl";
$class_m = "lvl";
console("cookie name: " . $_COOKIE["name"]);

if (isset($_POST["b"]) or isset($_POST["i"]) or isset($_POST["e"]) or isset($_POST["m"])) {

    console("b: " . $_POST["b"]);
    console("i: " . $_POST["i"]);
    console("e: " . $_POST["e"]);
    console("m: " . $_POST["m"]);
    console($class_b . " | " . $class_i . " | " . $class_e . " | " . $class_m);

    $name1 = $name2 = $name3 = $name4 = $name5 = $name6 = $name7 = $name8 = $name9 = $name10 = "N/A";
    $score1 = $score2 = $score3 = $score4 = $score5 = $score6 = $score7 = $score8 = $score9 = $score10 = "N/A";


    if (!empty($_POST["b"])) {
        $class_b = "lvl-active";
        $file = file("../textfile/b-leaderboard.txt");
        // foreach ($file as $line) {
        //     console($line);
        // }
        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            print_r($line);
            print_r("<br>" . $i . "<br>");
            switch ($i) {
                case 0:
                    $name1 = $line[2];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[2];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[2];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[2];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[2];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[2];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[2];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[2];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[2];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[2];
                    $score10 = $line[1];
                    break;
            }
        }
        // print_r($file);
        fclose($file);
    }
    if (!empty($_POST["i"])) {
        $class_i = "lvl-active";
        $file = file("../textfile/i-leaderboard.txt");
        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            print_r($line);
            print_r("<br>" . $i . "<br>");
            switch ($i) {
                case 0:
                    $name1 = $line[2];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[2];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[2];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[2];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[2];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[2];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[2];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[2];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[2];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[2];
                    $score10 = $line[1];
                    break;
            }
        }
        // print_r($file);
        fclose($file);
    }
    if (!empty($_POST["e"])) {
        $class_e = "lvl-active";
        $file = file("../textfile/e-leaderboard.txt");
        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            print_r($line);
            print_r("<br>" . $i . "<br>");
            switch ($i) {
                case 0:
                    $name1 = $line[2];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[2];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[2];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[2];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[2];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[2];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[2];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[2];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[2];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[2];
                    $score10 = $line[1];
                    break;
            }
        }
        // print_r($file);
        fclose($file);
    }
    if (!empty($_POST["m"])) {
        $class_m = "lvl-active";
        $file = file("../textfile/m-leaderboard.txt");
        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            print_r($line);
            print_r("<br>" . $i . "<br>");
            switch ($i) {
                case 0:
                    $name1 = $line[2];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[2];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[2];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[2];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[2];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[2];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[2];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[2];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[2];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[2];
                    $score10 = $line[1];
                    break;
            }
        }
        // print_r($file);
        fclose($file);
    }
}
?>

                <body>
                    <div id="Background">

                        <div id="main-container">
                            <div id="top-row">
                                <div id="logo-container"><img src="../assets/Logo.png" alt="Logo"></div>
                                <div id="title-container"><u>LEADERBOARD</u></div>
                                <div id="user-container">
                                    <h2 id="user">Hi <?= ucwords($_COOKIE["name"]) ?></h2>
                                </div>
                            </div>
                            <div id="middle-row">
                                <div id="levels">
                                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" style="display: inline-block;">
                                        <input type="submit" name="b" value="BEGINNER" class="<?= $class_b ?>"></form>
                                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" style="display: inline-block;">
                                        <input type="submit" name="i" value="INTERMEDIATE" class="<?= $class_i ?>"></form>
                                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" style="display: inline-block;">
                                        <input type="submit" name="e" value="EXPERT" class="<?= $class_e ?>"></form>
                                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" style="display: inline-block;">
                                        <input type="submit" name="m" value="MASTER" class="<?= $class_m ?>"></form>
                                    <!-- <button class="lvl">BEGINNER</button>
                    <button class="lvl">INTERMEDIATE</button>
                    <button class="lvl">EXPERT</button>
                    <button class="lvl">MASTER</button> -->
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
                                        <div class="leader-name"><?= $name1 ?></div>
                                        <div class="leader-time"><?= $score1 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">2</div>
                                        <div class="leader-name"><?= $name2 ?></div>
                                        <div class="leader-time"><?= $score2 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">3</div>
                                        <div class="leader-name"><?= $name3 ?></div>
                                        <div class="leader-time"><?= $score3 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">4</div>
                                        <div class="leader-name"><?= $name4 ?></div>
                                        <div class="leader-time"><?= $score4 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">5</div>
                                        <div class="leader-name"><?= $name5 ?></div>
                                        <div class="leader-time"><?= $score5 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">6</div>
                                        <div class="leader-name"><?= $name6 ?></div>
                                        <div class="leader-time"><?= $score6 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">7</div>
                                        <div class="leader-name"><?= $name7 ?></div>
                                        <div class="leader-time"><?= $score7 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">8</div>
                                        <div class="leader-name"><?= $name8 ?></div>
                                        <div class="leader-time"><?= $score8 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">9</div>
                                        <div class="leader-name"><?= $name9 ?></div>
                                        <div class="leader-time"><?= $score9 ?></div>
                                    </div>
                                    <div class="leader">
                                        <div class="leader-num">10</div>
                                        <div class="leader-name"><?= $name10 ?></div>
                                        <div class="leader-time"><?= $score10 ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>

</html>