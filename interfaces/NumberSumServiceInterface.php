<?php

namespace app\interfaces;

use app\dto\NumberSumRequestDto;

interface NumberSumServiceInterface
{
    public function sumEven(NumberSumRequestDto $dto): int;
}
