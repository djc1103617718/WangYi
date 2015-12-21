<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Comment;
use frontend\models\User;
use yii\web\Controller as WebController;
use frontend\libraries\base\Controller;
//use frontend\libraries\base\FilterForm;

/**
 * Class CommentController
 * @package frontend\controllers
 */
class CommentController extends Controller
{
    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (WebController::beforeAction($action)) {
            if (\Yii::$app->session['isLogin']) {
                return true;
            };
        }
        if (!empty(Yii::$app->request->get('from'))) {
            $from = Yii::$app->request->get('from');
        }
        if (!empty($from)) {
            $this->redirect(['user/login','from' => $from]);
            return false;
        }
        $this->redirect(['user/login']);
        return false;
    }
    /**
     * @return \yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Comment();
        $model->ip = Yii::$app->request->userIP;
        $model->username = Yii::$app->session['__username'];
        $model->user_id = User::find()->where(['username' => $model->username])->one()->id;
        $model->created_at = time();
        $model->updated_at = time();
        //$params = FilterForm::filterHtml();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['show/view','id' => $model->news_id]);
        }
        echo '发布失败，请重新发表评论！';
    }
}