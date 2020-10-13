<?php

namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'authenticator' => [
                'class' => HttpBearerAuth::class,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionCurrencies()
    {

        //TODO
    }

    public function actionCurrency(int $currency)
    {

        //TODO
    }
}
