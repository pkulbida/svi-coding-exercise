<?php declare(strict_types=1);
/*
* This file is part of svi/coding-exercise.
*
* (c) Petro Kulbida <petro.kulbida@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Calc;

use Calc\Notation\MathNotationHandlerInterface;

/**
 * Class Calculator
 * @package Calc
 */
class Calculator
{
    /**
     * @var MathNotationHandlerInterface
     */
    protected $notationHandler;

    /**
     * Calculator constructor.
     * @param MathNotationHandlerInterface $notationHandler
     */
    public function __construct(MathNotationHandlerInterface $notationHandler)
    {
        $this->notationHandler = $notationHandler;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function process($input)
    {
        return $this->notationHandler->evaluate($input);
    }
}
