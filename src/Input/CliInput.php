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
class CliInput implements InputInterface
{
    /**
     * CliInput constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return string|void
     */
    public function handleRequest()
    {
        // CLI call
        if (isset($_SERVER['argv'], $_SERVER['argc'])) {

        }
    }
}
