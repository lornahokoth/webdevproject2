<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
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
    </style>
</head>

<body>
    <div id="Background">
        <table id="Main-Table">
            <tr style="height:12vh;">
                <td width=10% style="padding: 10px;">
                    <div>
                        <img src="../assets/Logo.png" width="80vw" alt="logo">
                    </div>
                </td>
                <td width=68% style="font-size: 60pt; color: #C3FF14">
                    <u>LEADERBOARD</u>
                </td>
                <td width=10% style="text-align: right; position: relative;">
                    <h2 style="position: absolute;top: 0px;right: 10px;color:white;">Hi John</h2>
                </td>
            </tr>
            <tr style="height: 8vh;">
                <td width=10%></td>
                <td width=78% style="padding: 5px;">
                    <button class="level">EASY</button>
                    <button class="level">INTERMEDIATE</button>
                    <button class="level">HARD</button>
                    <button class="level">MASTER</button>
                </td>
            </tr>
            <tr>
                <td style="background-color: rgb(101, 132, 138);">words</td>
                <td style="background-color: rgb(75, 148, 130);">more words</td>
                <td style="background-color: rgb(43, 207, 139);">three more words</td>
            </tr>

        </table>
    </div>
</body>

</html>