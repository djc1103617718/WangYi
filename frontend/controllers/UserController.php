<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\UserLoginForm;
use frontend\models\UserSignupForm;
//use frontend\models\User;
use common\helper\SaveUrl;

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
        $model = new UserLoginForm();
        if ($model->whetherLoggedIn()) {
            Yii::$app->session->setFlash('success', '您之前已经登录该网站,如果想重新登录请先退出！');
            return $this->redirect(['show/index']);
        }

        if (!empty(Yii::$app->request->get('from'))) {
            $from = Yii::$app->request->get('from');
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                Yii::$app->session['__username'] = $model->username;
                Yii::$app->session['isLogin'] = true;

                if (!empty($from) && SaveUrl::isSafeUrl($from)) {
                    return $this->redirect($from);
                }
                Yii::$app->getSession()->setFlash('success', '登录成功！');
                return $this->redirect(['show/index']);
            } else {
                Yii::$app->getSession()->setFlash('error', '登录失败，请重新登录！');
            }
        }

        return $this->render('login',[
            'model' => $model,
            'from' => isset($from) ? $from : null
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionSignup()
    {
        $model = new UserSignupForm();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->signup()) {
                Yii::$app->getSession()->setFlash('success', '注册成功！');
                return $this->redirect(['login']);
            } else {
                Yii::$app->getSession()->setFlash('error', '注册失败,请重新注册！');
            }
        }
        return $this->render('signup',[
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
        }
        return $this->redirect(['show/index']);
    }

}