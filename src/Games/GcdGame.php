<?php

namespace Php\Project\Lvl1\Games\GcdGame;

// phpcs:disable
require 'vendor/autoload.php';
// phpcs:enable

use function Php\Project\Lvl1\Engine\showMessage;
use function Php\Project\Lvl1\Engine\getUserAnswer;
use function Php\Project\Lvl1\Engine\isCorrect;
use function Php\Project\Lvl1\Engine\getUserAttemptsCount;
use function Php\Project\Lvl1\Engine\getCalcResult;
use function Php\Project\Lvl1\Engine\checkAnswers;
use function Php\Project\Lvl1\Engine\gcd;

/**
 * Core of Brain-calc game
 *
 * @return void
 */
function game()
{
    showMessage("Welcome to the Brain Game!");
    $userName = getUserAnswer("May I have your name?");
    showMessage("Hello, {$userName}!");
    showMessage('Find the greatest common divisor of given numbers.');
    $i = 1;
    $attempts = getUserAttemptsCount();
    $isCompleted = false;

    while ($i <= $attempts) {
        $result = null;
        $randNumber1 = rand(1, 100);
        $randNumber2 = rand(1, 100);
        $result = gcd($randNumber1, $randNumber2);
        showMessage("Question: {$randNumber1} {$randNumber2}");
        $userAnswer = getUserAnswer('Your answer');
        $isAnswersEqual = checkAnswers($result, $userAnswer, $userName);
        if (!$isAnswersEqual) {
            return false;
        }
        $isCompleted = $i === $attempts;
        $i += 1;
    }
    showMessage('Congratulations, ' . $userName . '!');
}
