<?php

define('CLI_PROMPT', 'rpn> ');
define('CLI_EXIT_COMMAND', 'q');

define('ALLOWED_OPERATORS_MAP', [
    '*' => '\Calc\Operator\MultiplicationOperator',
    '/' => '\Calc\Operator\DivisionOperator',
    '+' => '\Calc\Operator\AdditionOperator',
    '-' => '\Calc\Operator\SubtractionOperator',
]);

