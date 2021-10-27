<?php

namespace Php\Project\Lvl1\Engine;

require 'vendor/autoload.php';

use function cli\line;
use function cli\prompt;

CONST ATTEMPTS = 3;

/**
 * Show game message
 * 
 * @param String $message 
 * 
 * @return void
 */
function showMessage(String $message): void
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
function getUserAnswer($message): string
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
function getCalcResult($operator, $num1, $num2): int
{
    switch($operator) {
    case '+':
        return $num1 + $num2;
    case '-':
        return $num1 - $num2;
    case '*':
        return $num1 * $num2;
    }
}
