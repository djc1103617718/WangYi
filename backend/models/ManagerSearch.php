<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Manager;

/**
 * ManagerSearch represents the model behind the search form about `backend\models\Manager`.
 */
class ManagerSearch extends Manager
{
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $userStatus;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['username', 'userStatus', 'status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Manager::find();

        // add conditions that should always apply here
        $query = $query->innerJoinWith('user');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'user_id',
                'status',
                'created_at',
                'updated_at',
                'username' => [
                    'asc' => ['wy_user.username' => SORT_ASC],
                    'desc' => ['wy_user.username' => SORT_DESC],
                    'label' => 'Username'
                ],

                'userStatus' => [
                    'asc' => ['wy_user.status' => SORT_ASC],
                    'desc' => ['wy_user.status' => SORT_DESC],
                    'label' => 'User Status',
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        if ($this->status == '合法') {
            $this->status = 1;
        } elseif ($this->status == '冻结') {
            $this->status = 2;
        }

        if ($this->userStatus == '合法') {
            $this->userStatus = 1;
        } elseif ($this->userStatus == '冻结') {
            $this->userStatus = 2;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'wy_manager.status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'wy_user.status' => $this->userStatus,
        ]);
        $query->andFilterWhere([
            'like', 'wy_user.username', $this->username
        ]);

        return $dataProvider;
    }
}