<?php

namespace frontend\libraries\base;

use Yii;
use yii\web\Controller as WebController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
class Controller extends WebController
{
    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if(parent::beforeAction($action)){
            if (\Yii::$app->session['isLogin']) {
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