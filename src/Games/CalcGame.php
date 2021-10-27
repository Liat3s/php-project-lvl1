<?php

namespace Php\Project\Lvl1\Games\CalcGame;

// phpcs:disable
require 'vendor/autoload.php';
// phpcs:enable

use function Php\Project\Lvl1\Engine\showMessage;
use function Php\Project\Lvl1\Engine\getUserAnswer;
use function Php\Project\Lvl1\Engine\isCorrect;
use function Php\Project\Lvl1\Engine\getUserAttemptsCount;
use function Php\Project\Lvl1\Engine\getCalcResult;

/**
 * Core of Brain-even game
 *
 * @return void
 */
function game()
{
    showMessage("Welcome to the Brain Game!");
    $userName = getUserAnswer("May I have your name?");
    showMessage("Hello, {$userName}!");
    showMessage('What is the result of the expression?');
    $i = 1;
    $attempts = getUserAttemptsCount();
    $isCompleted = false;
    $mathOperators = ['+', '-', '*'];

    while ($i <= $attempts) {
        $result = null;
        $randOperator = $mathOperators[rand(0, 2)];
        $randNumber1 = rand(1, 10);
        $randNumber2 = rand(1, 10);
        $result = getCalcResult($randOperator, $randNumber1, $randNumber2);
        showMessage("Question: {$randNumber1} {$randOperator} {$randNumber2}");
        $userAnswer = getUserAnswer('Your answer');
        if (isCorrect($result, $userAnswer)) {
            showMessage('Correct!');
            $isCompleted = $i === $attempts;
        } else {
            showMessage("'" . $userAnswer . "'" . ' is wrong answer ;(. Correct answer was ' . "'" . $result . "'");
            showMessage('Let\'s try again, ' . $userName . '!');
            return 0;
        }
        $i += 1;
    }
    if ($isCompleted) {
        showMessage('Congratulations, ' . $userName . '!');
    }
}
