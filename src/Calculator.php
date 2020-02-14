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

use Calc\Notation\MathNotationProcessorInterface;

/**
 * Class Calculator
 * @package Calc
 */
class Calculator
{
    const ERR_MESSAGE = 'Please provide proper data to calculate!';
    /**
     * @var MathNotationProcessorInterface
     */
    protected $notationProcessor;

    /**
     * Calculator constructor.
     * @param MathNotationProcessorInterface $notationProcessor
     */
    public function __construct(MathNotationProcessorInterface $notationProcessor)
    {
        $this->notationProcessor = $notationProcessor;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function process($input)
    {
        try {
            $result = $this->notationProcessor->process($input);
        } catch (\Exception $e) {
            $result = $e->getMessage() . self::ERR_MESSAGE;
        }

        return $result;
    }
}
