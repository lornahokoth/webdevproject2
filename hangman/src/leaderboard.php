<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0px;
            margin: 0px;
            font-family: 'Roboto', sans-serif;
            font-weight: bolder;
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
            height: 100%;
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
        }

        #leaders-container {
            padding-left: 2%;
            width: 100%;
            justify-content: space-between;
        }

        .leader {
            display: flex;
            align-items: center;
            flex-direction: row;
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background-color: #C3FF14;
            color: black;
            padding: 2% 1%;

        }

        .leader+.leader {
            margin-top: 20px;
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
                    <button class="lvl">INTERMEDIATE</button>
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
                    <div class="leader">user2</div>
                </div>
            </div>

        </div>
        <!-- <table id="Main-Table">
            <tr style="height:12vh;">
                <td width=10% style="padding: 10px;position: relative;">
                    <div style="position: absolute;top: 10px;">
                        <img src="../assets/Logo.png" width="80vw" alt="logo">
                    </div>
                </td>
                <td width=68% style="font-size: 60pt; color: #C3FF14;padding-left:20px;">
                    <u>LEADERBOARD</u>
                </td>
                <td width=10% style="text-align: right; position: relative;">
                    <h2 style="position: absolute;top: 0px;right: 10px;color:white;">Hi John</h2>
                </td>
            </tr>
            <tr style="height: 8vh;">
                <td width=10%></td>
                <td width=78% style="padding-left: 20px;">
                    <button class="level">EASY</button>
                    <button class="level">INTERMEDIATE</button>
                    <button class="level">HARD</button>
                    <button class="level">MASTER</button>
                </td>
            </tr>
            <tr>
                <td width=100% style="display: flex;justify-content: center;"><button id="play-button">PLAY
                        NOW!</button>
                </td>
                <td width=78% style="background-color: green;position: relative;">
                    <div class="leader">words</div>
                    <div class="leader">more words</div>
                    <div class="leader">words</div>
                    <div class="leader">more words</div>
                    <div class="leader">words</div>
                    <div class="leader">more words</div>
                </td>
            </tr>

        </table> -->
    </div>
</body>

</html>