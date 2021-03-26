<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/leaderboard.css" />
</head>

<?php
include "debug.php";
$class_b = "lvl";
$class_i = "lvl";
$class_e = "lvl";
$class_m = "lvl";

if (isset($_POST["b"]) or isset($_POST["i"]) or isset($_POST["e"]) or isset($_POST["m"])) {

    $name1 = $name2 = $name3 = $name4 = $name5 = $name6 = $name7 = $name8 = $name9 = $name10 = "N/A";
    $score1 = $score2 = $score3 = $score4 = $score5 = $score6 = $score7 = $score8 = $score9 = $score10 = "N/A";


    if (!empty($_POST["b"])) {
        $class_b = "lvl-active";
        $file = file("../textfile/b-leaderboard.txt");

        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            switch ($i) {
                case 0:
                    $name1 = $line[0];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[0];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[0];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[0];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[0];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[0];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[0];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[0];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[0];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[0];
                    $score10 = $line[1];
                    break;
            }
        };
        fclose($file);
    }
    if (!empty($_POST["i"])) {
        $class_i = "lvl-active";
        $file = file("../textfile/i-leaderboard.txt");
        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            switch ($i) {
                case 0:
                    $name1 = $line[0];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[0];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[0];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[0];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[0];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[0];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[0];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[0];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[0];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[0];
                    $score10 = $line[1];
                    break;
            }
        }
        fclose($file);
    }
    if (!empty($_POST["e"])) {
        $class_e = "lvl-active";
        $file = file("../textfile/e-leaderboard.txt");
        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            switch ($i) {
                case 0:
                    $name1 = $line[0];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[0];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[0];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[0];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[0];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[0];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[0];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[0];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[0];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[0];
                    $score10 = $line[1];
                    break;
            }
        }
        fclose($file);
    }
    if (!empty($_POST["m"])) {
        $class_m = "lvl-active";
        $file = file("../textfile/m-leaderboard.txt");
        for ($i = 0; $i < count($file); $i++) {
            $line = explode("|", $file[$i]);
            switch ($i) {
                case 0:
                    $name1 = $line[0];
                    $score1 = $line[1];
                    break;
                case 1:
                    $name2 = $line[0];
                    $score2 = $line[1];
                    break;
                case 2:
                    $name3 = $line[0];
                    $score3 = $line[1];
                    break;
                case 3:
                    $name4 = $line[0];
                    $score4 = $line[1];
                    break;
                case 4:
                    $name5 = $line[0];
                    $score5 = $line[1];
                    break;
                case 5:
                    $name6 = $line[0];
                    $score6 = $line[1];
                    break;
                case 6:
                    $name7 = $line[0];
                    $score7 = $line[1];
                    break;
                case 7:
                    $name8 = $line[0];
                    $score8 = $line[1];
                    break;
                case 8:
                    $name9 = $line[0];
                    $score9 = $line[1];
                    break;
                case 9:
                    $name10 = $line[0];
                    $score10 = $line[1];
                    break;
            }
        }
        fclose($file);
    }
}
?>

                <body>
                    <div class="Background">

                        <?php include("top.php"); ?>
                        <div id="main-container">
                            <div id="top-row">

                                <div id="title-container"><u>LEADERBOARD</u></div>
                                <div id="user-container">
                                    <h2 id="user">Hi <?php if (empty(ucwords($_COOKIE["name"]))) {
                                                            echo "User";
                                                        } else {
                                                            echo ucwords($_COOKIE["name"]);
                                                        } ?></h2>
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
                                        <a class="play-link" href="./play.php">
                                            PLAY NOW!</a>
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

                        <?php include("bottom.html"); ?>
                    </div>

                </body>

</html>