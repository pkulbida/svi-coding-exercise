<?php declare(strict_types=1);
/*
 * This file is part of svi/coding-exercise.
 *
 * (c) Petro Kulbida <petro.kulbida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Calc\Notation;

/**
 * Interface MathNotationHandlerInterface
 * @package Calc
 */
interface MathNotationHandlerInterface
{
    const BAD_TOKEN_ERROR_MESSAGE = 'Unsupported operand/operator! Use numbers and base arithmetic operators. ';
    const INSUFFICIENT_OPERANDS_MESSAGE = 'Could not perform `%s`. At least two values(operands) are required.';

    /**
     * @param string $input
     * @return mixed
     */
    public function evaluate(string $input);
}
