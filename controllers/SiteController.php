<?php

namespace app\controllers;

use app\models\Currency;
use Yii;
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
        $page = (int) (Yii::$app->request->get('page') ?? 1);
        $perPage = (int) (Yii::$app->request->get('perPage') ?? 15);

        $count = Currency::find()->count();

        $data = Currency::find()
            ->limit($perPage)
            ->offset(($page - 1) * $perPage)
            ->all();

        return $this->render('currencies', [
            'page' => $page,
            'perPage' => $perPage,
            'pagesCount' => (int) ceil($count / $perPage),
            'count' => $count,
            'data' => $data
        ]);
    }

    public function actionCurrency(int $currency)
    {

        //TODO
    }
}
