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

use Calc\Input\Interfaces\InputAbstract;

/**
 * Class CliInput
 * @package Calc
 */
class CliInput extends InputAbstract
{
    /**
     * @return string
     */
    protected function readInput(): string
    {
        fwrite(STDOUT,  "\033[0m" . CLI_PROMPT);

        return fgets(STDIN);
    }

    /**
     * @param string $input
     * @return mixed
     */
    protected function evaluateInput(string $input)
    {
        return $this->checkExitCommand($input)
            ->calculator->process($input);
    }

    /**
     * @param string|integer|float $result
     * @return mixed
     */
    protected function writeOutput($result)
    {
        return print $result . PHP_EOL;
    }

    /**
     * Exit REPL on Ctrl+D/`q`
     * @param $input
     * @return self
     */
    protected function checkExitCommand($input): InputAbstract
    {
        is_string($input) ?: die;
        trim($input) != CLI_EXIT_COMMAND ?: die;

        return $this;
    }
}
