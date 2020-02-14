<?php declare(strict_types=1);
/*
 * This file is part of svi/coding-exercise.
 *
 * (c) Petro Kulbida <petro.kulbida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Calc\Input;

use Calc\Calculator;

/**
 * Class InputInterface
 * @package Calc
 */
abstract class InputAbstract
{
    /**
     * @var Calculator
     */
    protected $calculator;

    /**
     * CliInput constructor.
     * @param Calculator $calculator
     */
    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * Brings up a REPL you can interact with
     * @return void
     */
    public function init(): void
    {
        do {
            $input  = $this->readInput();
            $result = $this->evaluateInput($input);
            $this->writeOutput($result);
        } while (true);
    }

    /**
     * @return string
     */
    abstract protected function readInput(): string;

    /**
     * @param string $input
     * @return mixed
     */
    abstract protected function evaluateInput(string $input): string;

    /**
     * @param string|integer|float $result
     * @return mixed
     */
    abstract protected function writeOutput($result);

    /**
     * @param $input
     * @return self
     */
    abstract protected function checkExitCommand($input): self;
}
