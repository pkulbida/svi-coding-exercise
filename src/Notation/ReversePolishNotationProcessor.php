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

use Calc\Notation\Interfaces\MathNotationProcessorInterface;

/**
 * Class ReversePolishNotation
 * @package Calc
 */
class ReversePolishNotationProcessor implements MathNotationProcessorInterface
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
        $inputAsArray = explode(' ', trim($input));

        for($i = 0; $i < count($inputAsArray); $i++)
        {
            if (is_numeric($inputAsArray[$i])) {
                array_push($this->stack, $inputAsArray[$i]);
            } else {

                $secondOperand = end($this->stack);
                array_pop($this->stack);
                $firstOperand = end($this->stack);
                array_pop($this->stack);

                $operatorClass = ALLOWED_OPERATORS_MAP[$inputAsArray[$i]];
                array_push($this->stack, $operatorClass::apply($firstOperand,$secondOperand));
            }
        }

        return end($this->stack);
    }
}
