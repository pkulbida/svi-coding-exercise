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

use Calc\Operator\Interfaces\ArithmeticOperatorInterface;

/**
 * Class AdditionOperator
 * @package Calc
 */
class AdditionOperator implements ArithmeticOperatorInterface
{
    /**
     * @param int|float $paramL
     * @param int|float $paramR
     * @return mixed|void
     */
    public static function apply($paramL, $paramR)
    {
        return $paramL + $paramR;
    }
}
