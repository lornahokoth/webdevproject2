<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Game</title>
    <link rel="stylesheet" href="../css/format.css" />
</head>

<body class="background">	
    <?php
        $history = json_decode($_COOKIE['history'], true); 
    ?>
    <header>
        <div class="row">
            <div class="extraWide" id="title"> HANGMAN </div>
            <div class="col" id="username"> USERNAME </div>
        </div>
    </header>

    <!-- <div id="timer"> Timer: </div> -->
    	
    <!-- hint pop up -->
    <a class="hbutton" href="#popup">Hint</a>
    <div id="popup" class="overlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
	    <p><br><br><?php echo $_COOKIE['hint']; ?> </p>
	</div>
    </div>
    <div class="gamelayout">
        <form action="./maingame-submit.php" method="POST">
            <div class="row">
                <div id="letterbox">
                    <div id="availLetter"> Available Letters </div>
                    <table id="letters">
                        <tr>
                            <td class="<?php if (in_array('A', $history)) {
                                            echo 'crossout';
                                        } ?>">A</td>
                            <td class="<?php if (in_array('B', $history)) {
                                            echo 'crossout';
                                        } ?>">B</td>
                            <td class="<?php if (in_array('C', $history)) {
                                            echo 'crossout';
                                        } ?>">C</td>
                            <td class="<?php if (in_array('D', $history)) {
                                            echo 'crossout';
                                        } ?>">D</td>
                            <td class="<?php if (in_array('E', $history)) {
                                            echo 'crossout';
                                        } ?>">E</td>
                            <td class="<?php if (in_array('F', $history)) {
                                            echo 'crossout';
                                        } ?>">F</td>
                        </tr>
                        <tr>
                            <td class="<?php if (in_array('G', $history)) {
                                            echo 'crossout';
                                        } ?>">G</td>
                            <td class="<?php if (in_array('H', $history)) {
                                            echo 'crossout';
                                        } ?>">H</td>
                            <td class="<?php if (in_array('I', $history)) {
                                            echo 'crossout';
                                        } ?>">I</td>
                            <td class="<?php if (in_array('J', $history)) {
                                            echo 'crossout';
                                        } ?>">J</td>
                            <td class="<?php if (in_array('K', $history)) {
                                            echo 'crossout';
                                        } ?>">K</td>
                            <td class="<?php if (in_array('L', $history)) {
                                            echo 'crossout';
                                        } ?>">L</td>
                        </tr>
                        <tr>
                            <td class="<?php if (in_array('M', $history)) {
                                            echo 'crossout';
                                        } ?>">M</td>
                            <td class="<?php if (in_array('N', $history)) {
                                            echo 'crossout';
                                        } ?>">N</td>
                            <td class="<?php if (in_array('O', $history)) {
                                            echo 'crossout';
                                        } ?>">O</td>
                            <td class="<?php if (in_array('P', $history)) {
                                            echo 'crossout';
                                        } ?>">P</td>
                            <td class="<?php if (in_array('Q', $history)) {
                                            echo 'crossout';
                                        } ?>">Q</td>
                            <td class="<?php if (in_array('R', $history)) {
                                            echo 'crossout';
                                        } ?>">R</td>
                        </tr>
                        <tr>
                            <td class="<?php if (in_array('S', $history)) {
                                            echo 'crossout';
                                        } ?>">S</td>
                            <td class="<?php if (in_array('T', $history)) {
                                            echo 'crossout';
                                        } ?>">T</td>
                            <td class="<?php if (in_array('U', $history)) {
                                            echo 'crossout';
                                        } ?>">U</td>
                            <td class="<?php if (in_array('V', $history)) {
                                            echo 'crossout';
                                        } ?>">V</td>
                            <td class="<?php if (in_array('W', $history)) {
                                            echo 'crossout';
                                        } ?>">W</td>
                            <td class="<?php if (in_array('X', $history)) {
                                            echo 'crossout';
                                        } ?>">X</td>
                        </tr>
                        <tr>
                            <td class="crossout" colspan="2"></td>
                            <td class="<?php if (in_array('Y', $history)) {
                                            echo 'crossout';
                                        } ?>">Y</td>
                            <td class="<?php if (in_array('Z', $history)) {
                                            echo 'crossout';
                                        } ?>">Z</td>
                        </tr>

                    </table>
                    <?php
                    $tableContent = file_get_contents("./maingame.php", FILE_APPEND);
                    $DOM = new DOMDocument();
                    $DOM->loadHTML($tableContent);
                    $detail = $DOM->getElementsByTagName('td');

                    foreach ($detail as $NodeDetail) {
                        if ($NodeDetail->textContent != null) {
                            $letter[] = trim($NodeDetail->textContent);
                        }
                    }
                    ?>
                </div>

                <div id="man">
                    <?php
                    echo PHP_EOL;
                    echo (" +---+") . PHP_EOL;
                    echo (" |   |") . PHP_EOL;
                    echo (" o   |") . PHP_EOL;
                    echo ("/|\  |") . PHP_EOL;
                    echo ("/ \  |") . PHP_EOL;
                    echo ("     |") . PHP_EOL;
                    echo ("     |") . PHP_EOL;
                    echo ("=======") . PHP_EOL;
                    ?>
                </div>
            </div>
            <div id="word">

                <?php
                $display = $_COOKIE["display"];
                for ($i = 0; $i < strlen($display); $i++) {
                    echo "<div class='letter'>" . $display[$i] . "</div>";
                }
                ?>

            </div>
            <div class="row shiftdown">
                <div class="textbox">
                    <input type="text" placeholder="Enter 1 Character or a Word" name="guess" size="22" />
                </div>
                <div class="textbox submit">
                    <input name="form" type="submit" value="Guess" />
                </div>

            </div>
        </form>
    </div>

</body>

</html>