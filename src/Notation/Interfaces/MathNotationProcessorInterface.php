<?php declare(strict_types=1);
/*
 * This file is part of svi/coding-exercise.
 *
 * (c) Petro Kulbida <petro.kulbida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Calc\Notation\Interfaces;

/**
 * Interface MathNotationInterface
 * @package Calc
 */
interface MathNotationProcessorInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function evaluate(string $input);
}