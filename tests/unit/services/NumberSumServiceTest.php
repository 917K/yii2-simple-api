<?php

namespace tests\services\unit;

use app\dto\NumberSumRequestDto;
use app\services\NumberSumService;
use PHPUnit\Framework\TestCase;

class NumberSumServiceTest extends TestCase
{
    public function testSumEvenNumbers()
    {
        $dto = new NumberSumRequestDto(['numbers' => [1, 2, 3, 4, 5, 6]]);
        $service = new NumberSumService();
        $this->assertEquals(12, $service->sumEven($dto));
    }

    public function testEmptyArrayReturnsZero()
    {
        $dto = new NumberSumRequestDto(['numbers' => []]);
        $service = new NumberSumService();
        $this->assertEquals(0, $service->sumEven($dto));
    }

    public function testAllOddNumbersReturnsZero()
    {
        $dto = new NumberSumRequestDto(['numbers' => [1, 3, 5]]);
        $service = new NumberSumService();
        $this->assertEquals(0, $service->sumEven($dto));
    }
}
