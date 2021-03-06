<?php declare(strict_types=1);
/*
 * This file is part of svi/coding-exercise.
 *
 * (c) Petro Kulbida <petro.kulbida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Calc\Operator;

/**
 * Class DivisionOperator
 * @package Calc
 */
class DivisionOperator implements ArithmeticOperatorInterface
{
    /**
     * @param int|float $firstOperand
     * @param int|float $secondOperand
     * @return mixed
     */
    public static function apply($firstOperand, $secondOperand)
    {
        return $firstOperand / $secondOperand;
    }
}
