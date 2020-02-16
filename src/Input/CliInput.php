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

/**
 * Class CliInput
 * @package Calc
 */
class CliInput extends InputAbstract
{
    const MESSAGE = 'Please provide proper data to calculate!';

    /**
     * @return string
     */
    protected function readInput()
    {
        fwrite(STDOUT, "\033[0m" . CLI_PROMPT);

        return fgets(STDIN);
    }

    /**
     * @param string $input
     * @return mixed
     */
    protected function evaluateInput($input)
    {
        try {
            $result = $this->checkExitCommand($input)
                ->calculator->process($input);
        } catch (\Error $error) {
            fwrite(STDOUT, "\033[31m" . $error->getMessage() .  PHP_EOL . "\033[0m");
        } catch (\Exception $e) {
            fwrite(STDOUT, "\033[31m" . $e->getMessage() .  PHP_EOL . "\033[0m");
        }

        return $result ?? self::MESSAGE;
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
        is_string($input) ?: $this->terminate();
        trim($input) != CLI_EXIT_COMMAND ?: $this->terminate();

        return $this;
    }

    protected function terminate()
    {
        exit;
    }
}
