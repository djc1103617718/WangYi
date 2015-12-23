<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ManagerLoginForm;

/**
 * Class UserController
 * @package frontend\controllers
 */
class UserController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $model = new ManagerLoginForm();
        if ($model->whetherLoggedIn()) {
            Yii::$app->session->setFlash('success', '您之前已经登录该网站,如果想重新登录请先退出！');
            return $this->redirect(['news/index']);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->login() && $model->isManager()) {
                Yii::$app->session['__username'] = $model->username;
                Yii::$app->session['isLogin'] = true;
                Yii::$app->session['isManager'] = true;

                Yii::$app->getSession()->setFlash('success', '登录成功！');
                return $this->redirect(['news/index']);
            } else {
                Yii::$app->getSession()->setFlash('error', '登录失败，请重新登录！');
            }
        }

        return $this->render('login',[
            'model' => $model,
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        if(Yii::$app->session['isLogin']){
            unset(Yii::$app->session['isLogin']);
            unset(Yii::$app->session['__username']);
            unset(Yii::$app->session['isManager']);
        }
        return $this->redirect(['news/index']);
    }

}