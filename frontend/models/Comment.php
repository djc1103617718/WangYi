<?php

namespace frontend\models;

use Yii;
use common\models\Comment as CommentCommon;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property integer $news_id
 * @property integer $user_id
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 */
class Comment extends CommentCommon
{
    /**
     * @param $news_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getCommentByNewsId($news_id)
    {
        $comments = self::find()->where(['news_id' => $news_id]);
        return $comments;
    }

    /**
     * @param $news_id
     * @return int
     */
    public function countByUser($news_id)
    {
        $connection = Yii::$app->db;
        $sql = "SELECT COUNT(DISTINCT user_id) AS num FROM wy_comment WHERE news_id = $news_id";
        $command = $connection->createCommand($sql);
        $result = $command->queryOne();
        return $result['num'];
    }
}