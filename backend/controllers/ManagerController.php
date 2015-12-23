<?php

namespace backend\controllers;

use Yii;
//use yii\web\Controller;
use backend\models\Manager;
use backend\models\ManagerForm;
use backend\models\User;
use backend\models\ManagerSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\libraries\base\Controller;

/**
 * ManagerController implements the CRUD actions for Manager model.
 */
class ManagerController extends Controller
{
    /**
     * Lists all Manager models.
     * @return mixed
     */
    public function actionIndex()
    {
        if ($click = Yii::$app->request->get('click')) {
            $view = Yii::$app->view;
            $view->params['click'] = $click;
        }
        $searchModel = new ManagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manager model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Manager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ManagerForm();
        if ($model->load(Yii::$app->request->post())){
            if ($model->createManager()) {
                Yii::$app->session->setFlash('success', '新增管理员成功！');
                return $this->redirect(['manager/index']);
            } else {
                Yii::$app->session->setFlash('error', '新增管理员失败，请重新添加！');
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Manager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new ManagerForm();
        $model = $model->getModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->updateManager()) {
                Yii::$app->session->setFlash('success', '修改管理员成功！');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', '修改管理员失败！');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Manager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 2;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Manager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Manager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Manager::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}