<?php

namespace Php\Project\Lvl1\Engine;

// phpcs:disable
require 'vendor/autoload.php';
// phpcs:enable

use function cli\line;
use function cli\prompt;

const ATTEMPTS = 3;

/**
 * Show game message
 *
 * @param String $message
 *
 * @return void
 */
function showMessage(string $message): void
{
    \cli\line($message);
}

/**
 * Get user answer on question
 *
 * @param String $message
 *
 * @return String
 */
function getUserAnswer(string $message): string
{
    return \cli\prompt($message);
}

/**
 * Check if user answer was correct
 *
 * @param $num1 - right answer
 * @param $num2 - user answer
 *
 * @return Boolean
 */
function isCorrect(string $num1, string $num2): bool
{
    return $num1 === $num2;
}

/**
 * Get count of rounds
 *
 * @return Integer
 */
function getUserAttemptsCount(): int
{
    return ATTEMPTS;
}

/**
 * Calculate operation
 *
 * @param String $operator Math sign ('+', '-', '*')
 * @param String $num1     random number (0-10)
 * @param String $num2     random number (0-10)
 *
 * @return Integer $result
 */
function getCalcResult(string $operator, string $num1, string $num2): int
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
}

/**
 * Check answers equality and show message correct/incorrect
 *
 * @param $rightAnswer
 * @param $userAnswer
 * @param $userName
 *
 * @return Boolean
 */
function checkAnswers(string $rightAnswer, string $userAnswer, string $userName): bool
{
    $isCorrectAnswer = isCorrect($rightAnswer, $userAnswer);
    if ($isCorrectAnswer) {
        showMessage('Correct!');
    } else {
        showMessage("'" . $userAnswer . "'" . ' is wrong answer ;(. Correct answer was ' . "'" . $rightAnswer . "'");
        showMessage('Let\'s try again, ' . $userName . '!');
    }
    return $isCorrectAnswer;
}

/*
* function gcd()
*
* returns greatest common divisor
* between two numbers
* tested against gmp_gcd()
*/
function gcd($a, $b)
{
    if ($a == 0 || $b == 0) {
        return abs(max(abs($a), abs($b)));
    }
    $r = $a % $b;
    return ($r != 0) ?
        gcd($b, $r) :
        abs($b);
}
