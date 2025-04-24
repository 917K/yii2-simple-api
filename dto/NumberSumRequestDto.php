<?php

namespace app\dto;

use yii\base\Model;

class NumberSumRequestDto extends Model
{
    public array $numbers = [];

    public function __construct(array $data = [])
    {
        parent::__construct();
        $this->numbers = $data['numbers'] ?? [];
    }

    public function rules(): array
    {
        return [
            [['numbers'], 'required'],
            [['numbers'], 'each', 'rule' => ['integer']],
        ];
    }
}
