<?php

$leaderboard = file_get_contents('leaderboard.txt');
if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    $score = $_COOKIE['score'];
    $text = '';
    if ($leaderboard) {
        while (($line = fgets($leaderboard)) !== false) {
            if (strpos($line, $name) == false) {
                $text = $name . "|" . $score . ",";
                file_put_contents($text, $leaderboard);
            } else { }
        }

        fclose($leaderboard);
    } else {
        return "file not found";
    }
}



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
            /* Remove scrollbar space */
            background: transparent;
            /* Optional: just make scrollbar invisible */
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
                    <button class="lvl">EASY</button>
                    <button class="lvl">MEDIUM</button>
                    <button class="lvl">HARD</button>
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
                        <div class="leader-name">John</div>
                        <div class="leader-time">5:00</div>
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