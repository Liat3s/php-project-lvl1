<?php

namespace Php\Project\Lvl1\Engine;

// phpcs:disable
// Путь который будет использован при глобальной установке пакета
$autoloadPath1 = __DIR__ . '/../../../autoload.php';
// Путь для локальной работы с проектом
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
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

/**
 * Generate line of numbers and make a hidden certain element
 *
 * @return Array
 */
function generatePrime()
{
    $primeColl = [];
    $step = rand(1, 9);
    $min = rand(1, 100);
    $primeCollCount = 10;
    $hiddenNumberIndex = rand(0, 9);
    $rightAnswer = null;
    for ($i = 0; $i < $primeCollCount; $i++) {
        $primeColl[] = $min + $step;
        $min = $min + $step;
    }
    $rightAnswer = $primeColl[$hiddenNumberIndex];
    $primeColl[$hiddenNumberIndex] = '..';
    return [implode(' ', $primeColl), $rightAnswer];
}

/**
 * Check if number is prime
 *
 * @param Integer $number
 *
 * @return String
 */
function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 3; $i < $number; $i += 2) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}
