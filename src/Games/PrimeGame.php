<?php

namespace Php\Project\Lvl1\Games\PrimeGame;

// phpcs:disable
require 'vendor/autoload.php';
// phpcs:enable

use function Php\Project\Lvl1\Engine\showMessage;
use function Php\Project\Lvl1\Engine\getUserAnswer;
use function Php\Project\Lvl1\Engine\isCorrect;
use function Php\Project\Lvl1\Engine\getUserAttemptsCount;
use function Php\Project\Lvl1\Engine\checkAnswers;
use function Php\Project\Lvl1\Engine\isPrime;

/**
 * Core of Brain-pregression game
 *
 * @return void
 */
function game()
{
    showMessage("Welcome to the Brain Game!");
    $userName = getUserAnswer("May I have your name?");
    showMessage("Hello, {$userName}!");
    showMessage('Answer "yes" if given number is prime. Otherwise answer "no".');
    $i = 1;
    $attempts = getUserAttemptsCount();
    $isCompleted = false;

    while ($i <= $attempts) {
        $randomNumber = rand(0, 1000);
        $isPrimeNumber = isPrime($randomNumber);
        showMessage('Question: ' . $randomNumber);
        $userAnswer = getUserAnswer('Your answer');
        $isAnswersEqual = checkAnswers($isPrimeNumber, $userAnswer, $userName);
        if (!$isAnswersEqual) {
            return false;
        }
        $isCompleted = $i === $attempts;
        $i += 1;
    }
    showMessage('Congratulations, ' . $userName . '!');
}
