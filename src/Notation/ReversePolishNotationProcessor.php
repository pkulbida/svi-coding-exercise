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

/**
 * Class ReversePolishNotation
 * @package Calc
 */
class ReversePolishNotationProcessor implements MathNotationProcessorInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function process(string $input)
    {
        $pre  = '(?:^|\s+)';
        $post = '(?:\s+|$)';

        $num = '([+-]?(?:\.\d+|\d+(?:\.\d*)?))';

        $op = '([-+*\/])';

        do {
            $input = preg_replace("/$pre$num\\s+$num\\s+$op$post/e", "' '.($1 $3 $2).' '", $input, -1, $n);
        } while ($n);

        return preg_match("/^\\s*$num\\s*$/",$input) ? floatval($input) : 'error';
    }
}
