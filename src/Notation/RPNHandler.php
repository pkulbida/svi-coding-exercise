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

use Calc\Exception\InsufficientOperandsException;
use Calc\Exception\ZeroDivisionException;

/**
 * Class RPNHandler
 * @package Calc
 */
class RPNHandler implements MathNotationHandlerInterface
{
    /**
     * @var array
     */
    private $stack = [];

    /**
     * @param string $input
     * @return mixed
     */
    public function evaluate(string $input)
    {
        /** @var array $expression */
        $expression = explode(' ', trim($input));

        foreach($expression as $token)
        {
            // if token is an operand - push to the stack
            if (is_numeric($token)) {
                array_push($this->stack, $token);
            // if token is an operator - apply operator & push result to the stack
            } elseif (array_key_exists($token, ALLOWED_OPERATORS_MAP) && $this->isOperatorApplicable($token)) {
                $secondOperand = array_pop($this->stack);
                $firstOperand  = array_pop($this->stack);
                array_push($this->stack, (ALLOWED_OPERATORS_MAP[$token])::apply($firstOperand,$secondOperand));
            } else {
                throw new \UnexpectedValueException(self::BAD_TOKEN_ERROR_MESSAGE);
            }
        }

        return end($this->stack);
    }

    /**
     * @param string $operator
     * @return bool
     */
    protected function isOperatorApplicable($operator)
    {
        $secondOperand = end($this->stack);
        $firstOperand  = prev($this->stack);

        if (!is_numeric($firstOperand) || !is_numeric($secondOperand)) {
            throw new InsufficientOperandsException(sprintf(self::INSUFFICIENT_OPERANDS_MESSAGE, $operator));
        }

        if ($operator == '/' && end($this->stack) == 0) {
            throw new ZeroDivisionException();
        }

        return true;
    }
}
