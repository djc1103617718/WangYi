<?php

namespace frontend\controllers;

use Yii;
use frontend\libraries\base\Controller;
use frontend\models\UserResetPasswordForm;
use frontend\models\UserValidatePasswordForm;
use frontend\models\User;

/**
 * Class UserCentreController
 * @package frontend\controllers
 */
class UserCentreController extends Controller
{
    public function actionIndex()
    {
        $model = $this->findModelBySession();
        return $this->render('view',[
            'model' => $model
        ]);

    }

    /**
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdateProfile()
    {
        if (!Yii::$app->request->get('validate')) {
            return $this->redirect(['validate-password', 'action' => 'user-centre/update-profile']);
        }

        $model = $this->findModelBySession();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->save()) {
                unset(Yii::$app->session['__username']);
                Yii::$app->session['__username'] = $model->username;
                Yii::$app->getSession()->setFlash('success', '修改成功！');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', '修改失败！');
            }
        }

        return $this->render('update-profile', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionResetPassword()
    {
        if (!Yii::$app->request->get('validate')) {
            return $this->redirect(['validate-password', 'action' => 'user-centre/reset-password']);
        }

        $model = new UserResetPasswordForm();

        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->resetPassword()) {
                Yii::$app->getSession()->setFlash('success', '修改成功！');
                return $this->redirect(['view', 'id' => $user->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', '修改失败！');
            }
        }
        return $this->render('reset-password',[
           'model' => $model,
        ]);
    }

    /**
     * @param $action
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionValidatePassword($action)
    {
        $model = new UserValidatePasswordForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validatePassword()) {
                Yii::$app->getSession()->setFlash('success', '验证通过！');
                return $this->redirect([$action, 'validate' => 1]);
            } else {
                Yii::$app->getSession()->setFlash('error', '验证失败！');
            }
        }

        return $this->render('validate-password', [
            'model' => $model,
            'action' => $action
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view',[
            'model' => $model
        ]);

    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionLogoutAccount($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('default');
        $model->status = 2;

        if ($model->save()) {
            unset(Yii::$app->session['isLogin']);
            unset(Yii::$app->session['__username']);
            Yii::$app->getSession()->setFlash('success', '帐号已经注销！');
            return $this->redirect(['show/index']);
        } else {
            Yii::$app->getSession()->setFlash('error', '注销失败！');
        }
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    protected function findModelBySession()
    {
       if ($username = Yii::$app->session['__username']) {
            if (($model = User::find()->where(['username' => $username])->one()) !== null) {
                return $model;
            }
       }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}