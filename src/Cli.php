<?php

namespace Php\Project\Lvl1\cli;

use function cli\line;
use function cli\prompt;

function greeting(): void
{
    \cli\line('Welcome to the Brain Game!');
    $name = \cli\prompt('May I have your name?');
    \cli\line("Hello, %s!", $name);
}
