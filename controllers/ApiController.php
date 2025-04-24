<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use app\dto\NumberSumRequestDto;
use app\services\NumberSumService;
use yii\filters\ContentNegotiator;
use yii\web\JsonParser;
use yii\filters\VerbFilter;

class ApiController extends Controller
{

    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class'   => ContentNegotiator::class,
                'formats' => ['application/json' => Response::FORMAT_JSON],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => ['sum-even' => ['post']],
            ],
        ];
    }

    public function beforeAction($action)
    {
        Yii::$app->request->parsers = ['application/json' => JsonParser::class];
        return parent::beforeAction($action);
    }

    public function actionSumEven()
    {
        $bodyParams = Yii::$app->request->bodyParams;

        $dto = new NumberSumRequestDto($bodyParams);
        if (!$dto->validate()) {
            throw new BadRequestHttpException(implode(', ', $dto->getFirstErrors()));
        }

        $service = new NumberSumService();
        $sum = $service->sumEven($dto);

        return ['sum' => $sum];
    }
}
