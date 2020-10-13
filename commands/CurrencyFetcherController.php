<?php

namespace app\commands;

use app\models\Currency;
use yii\console\Controller;
use Yii;

class CurrencyFetcherController extends Controller
{
    public function actionFetch()
    {
        $currencies = Yii::$app->currencyFetcher->getCurrencyData();

        if ($currencies !== null) {
            $transaction = Yii::$app->db->beginTransaction();
            Yii::$app->db->createCommand()->truncateTable('currency')->execute();
            foreach ($currencies as $currency) {
                $model = new Currency();
                $model->setAttributes([
                    'name' => $currency['Name'],
                    'rate' => (float) str_replace(',', '.', $currency['Value']),
                ]);
                $model->save();
            }

            $transaction->commit();
        }
    }
}
