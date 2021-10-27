<?php

namespace Php\Project\Lvl1\Games\EvenGame;

// phpcs:disable
require 'vendor/autoload.php';
// phpcs:enable

use function Php\Project\Lvl1\Engine\showMessage;
use function Php\Project\Lvl1\Engine\getUserAnswer;
use function Php\Project\Lvl1\Engine\isCorrect;
use function Php\Project\Lvl1\Engine\getUserAttemptsCount;
use function Php\Project\Lvl1\Engine\checkAnswers;

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
    showMessage('Answer "yes" if the number is even, otherwise answer "no".');
    $i = 1;
    $attempts = getUserAttemptsCount();
    $isCompleted = false;

    while ($i <= $attempts) {
        $questionNumber = rand(0, 100);
        $isEven = $questionNumber % 2 == 0;
        $isEvenText = $isEven ? 'yes' : 'no';
        showMessage('Question: ' . $questionNumber);
        $userAnswer = getUserAnswer('Your answer');
        $isAnswersEqual = checkAnswers($isEvenText, $userAnswer, $userName);
        if (!$isAnswersEqual) {
            return false;
        }
        $isCompleted = $i === $attempts;
        $i += 1;
    }
    showMessage('Congratulations, ' . $userName . '!');
}
