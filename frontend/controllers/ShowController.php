<?php

namespace frontend\controllers;

use Yii;
use frontend\models\News;
use frontend\models\NewsSearch;
use common\models\UserHelper;
use frontend\models\Comment;
use yii\data\Pagination;

//use frontend\models\searches\CommentSearch;

/**
 * Class ShowController
 * @package frontend\controllers
 */
class ShowController extends \yii\web\Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        if ($tmp = Yii::$app->request->get('NewsSearch')) {
            $click = isset($tmp['category_id']) ? $tmp['category_id'] : null;
        }
        $view = Yii::$app->view;
        $view->params['click'] = empty($click) ? null : $click;
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render(
            'index',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $comment = new Comment();
        $num = $comment->countByUser($id);
        $commentData = $comment->getCommentByNewsId($id);
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $commentData->count(),
        ]);
        $commentData = $commentData->orderBy('created_at DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('view',
            [
                'model' => $this->findModel($id),
                'comment' => $comment,
                'commentData' => $commentData,
                'commentNum' => $num[0],
                'pagination' => $pagination
            ]);
    }

    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}