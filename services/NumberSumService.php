<?php

namespace app\services;

use app\dto\NumberSumRequestDto;
use app\interfaces\NumberSumServiceInterface;

class NumberSumService implements NumberSumServiceInterface
{
    public function sumEven(NumberSumRequestDto $dto): int
    {
        return array_sum(array_filter($dto->numbers, fn($n) => $n % 2 === 0));
    }
}
