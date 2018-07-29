<?php

namespace dssource\clients\controllers;

use Yii;
use yii\base\ErrorException;
use yii\web\Controller;
use dssource\clients\models\Client;
use yii\data\ActiveDataProvider;

class AdminClientsController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Client::find(),
            'pagination' => [
                'pageSize' => 100,
            ],
            'sort' => [
                'defaultOrder' => [
                    'create_at' => SORT_DESC,
                ]
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionAssetsClear()
    {
        $this->removeDir(Yii::getAlias('@app/assets'));
        Yii::$app->getSession()->setFlash('success', 'Assets очищены');
        $this->redirect('/admin');
    }

    public static function removeDir($path)
    {
        if(file_exists($path) && is_dir($path))
        {
           foreach(glob($path.'/*') as $file)
           {
               if(is_dir($file))
               {
                   self::removeDir($file);
                   rmdir($file);
               }
               else
               {
                   unlink($file);
               }
           }
        }
        else
            throw new ErrorException("Не верный путь к Assets: ".$path);
    }

}