<?php

namespace Php\Project\Lvl1\Games\CalcGame;

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
use function Php\Project\Lvl1\Engine\getCalcResult;
use function Php\Project\Lvl1\Engine\checkAnswers;

/**
 * Core of Brain-calc game
 */
function game(): void
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
        $isAnswersEqual = checkAnswers((string)$result, $userAnswer, $userName);
        if (!$isAnswersEqual) {
            return;
        }
        $isCompleted = $i === $attempts;
        $i += 1;
    }
    showMessage('Congratulations, ' . $userName . '!');
}
