<?php
namespace Tests\Unit\Notation;

use Calc\Notation\{MathNotationHandlerInterface, RPNHandler};
use PHPUnit\Framework\TestCase;
use Calc\Exception\{InsufficientOperandsException, ZeroDivisionException};

/**
 * @coversDefaultClass \Calc\Notation\RPNHandler
 * @small
 */
class RPNHandlerTest extends TestCase
{
    /**
     * @var MathNotationHandlerInterface
     */
    private $rpnHandler;

    protected function setUp()
    {
        $this->rpnHandler = new RPNHandler();
    }

    /**
     * @group testInitials
     */
    public function testAllowedOperatorsMapExists()
    {
        $this->assertTrue(!empty(ALLOWED_OPERATORS_MAP));
    }

    /**
     * @group testOperator
     * @dataProvider addDataProvider
     * @param string $input
     * @param mixed $expected
     */
    public function testEvaluateAddition(string $input, $expected)
    {
        $this->assertContains('+', $input);
        $this->assertEquals($expected, $this->rpnHandler->evaluate($input));
    }

    /**
     * @group testOperator
     * @dataProvider divDataProvider
     * @param string $input
     * @param mixed $expected
     */
    public function testEvaluateDivision(string $input, $expected)
    {
        $this->assertContains('/', $input);
        $this->assertEquals($expected, $this->rpnHandler->evaluate($input));
    }

    /**
     * @group testOperator
     * @dataProvider multiDataProvider
     * @param string $input
     * @param mixed $expected
     */
    public function testEvaluateMultiplication(string $input, $expected)
    {
        $this->assertContains('*', $input);
        $this->assertEquals($expected, $this->rpnHandler->evaluate($input));
    }

    /**
     * @group testOperator
     * @dataProvider subDataProvider
     * @param string $input
     * @param mixed $expected
     */
    public function testEvaluateSubtraction(string $input, $expected)
    {
        $this->assertContains('-', $input);
        $this->assertEquals($expected, $this->rpnHandler->evaluate($input));
    }

    /**
     * @group testException
     * @dataProvider badInputDataProvider
     * @param string $input
     */
    public function testEvaluateBadInput(string $input)
    {
        $this->expectException(\UnexpectedValueException::class);

        $this->rpnHandler->evaluate($input);
    }

    /**
     * @group testException
     * @dataProvider insufficientOperandsDataProvider
     * @param string $input
     */
    public function testEvaluateWhenInsufficientOperands(string $input)
    {
        $this->expectException(InsufficientOperandsException::class);

        $this->rpnHandler->evaluate($input);
    }

    /**
     * @group testException
     * @dataProvider ZeroDivisionInputDataProvider
     * @param string $input
     */
    public function testEvaluateWhenZeroDivisionOccurs(string $input)
    {
        $this->expectException(ZeroDivisionException::class);

        $this->rpnHandler->evaluate($input);
    }

    public function addDataProvider()
    {
        return [
            ['4 0 + ', '4'],
            ['3 -67 - 7 + ', '77'],
            ['3 11 45 6 + ', '51'],
        ];
    }

    public function divDataProvider()
    {
        return [
            ['4 1 / ', '4'],
            ['3 -67 - 7 / ', '10'],
            ['3 11 45 6 /', '7.5'],
        ];
    }

    public function multiDataProvider()
    {
        return [
            ['4 0 * ', '0'],
            ['3 -67 - 7 * ', '490'],
            ['3 11 45 6 * ', '270'],
        ];
    }

    public function subDataProvider()
    {
        return [
            ['4 0 - ', '4'],
            ['3 -67 - 7 - ', '63'],
            ['3 11 45 6 - ', '39'],
        ];
    }

    public function ZeroDivisionInputDataProvider()
    {
        return [
            ['4 0 / '],
            ['3 -67 - 0 / '],
        ];
    }

    public function insufficientOperandsDataProvider()
    {
        return [
            ['5 / '],
            [' +'],
            [' 4 5 + 9 * +'],
            ['- + 9'],
            ['-6 -'],
        ];
    }

    public function badInputDataProvider()
    {
        return [
            [''],
            ['q'],
            ['3 6 lll'],
            ['!&'],
            ['^']
        ];
    }
}
