<?php
namespace backend\libraries\base;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller as WebController;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class Controller extends WebController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        /*return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];*/
        parent::behaviors();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


}