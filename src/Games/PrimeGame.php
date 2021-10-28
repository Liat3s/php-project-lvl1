<?php

namespace Php\Project\Lvl1\Games\PrimeGame;

// phpcs:disable
// Путь который будет использован при глобальной установке пакета
$autoloadPath1 = __DIR__ . '/../../../../autoload.php';
// Путь для локальной работы с проектом
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
// phpcs:enable

use function Php\Project\Lvl1\Engine\showMessage;
use function Php\Project\Lvl1\Engine\getUserAnswer;
use function Php\Project\Lvl1\Engine\isCorrect;
use function Php\Project\Lvl1\Engine\getUserAttemptsCount;
use function Php\Project\Lvl1\Engine\checkAnswers;
use function Php\Project\Lvl1\Engine\isPrime;

/**
 * Core of Brain-pregression game
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
