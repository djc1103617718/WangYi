<?php

namespace backend\libraries\base;

use Yii;
use yii\web\Controller as Web;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
class Controller extends Web
{
    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if(parent::beforeAction($action)){
            if (\Yii::$app->session['isManager']) {
                return true;
            };
        }
        $this->redirect(['user/login']);
        return false;
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

}