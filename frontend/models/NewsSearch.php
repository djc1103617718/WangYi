<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Category;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form about `frontend\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @var
     */
    public $category_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['title', 'description', 'content', 'category_name', 'created_at', 'updated_at'], 'safe'],
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

        $query = News::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);

        $dataProvider->setSort([
                'attributes' => [
                    'category_name' => [
                        'asc' => ['category.name' => SORT_ASC],
                        'desc' => ['category.name' => SORT_DESC],
                        'label' => 'Category name'
                    ],
                ]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //关联表的操作
        if ($this->category_name) {
            $categoryArray = self::categoryIdToName();
            $id = array_search($this->category_name,$categoryArray);
            if ($id) {
                $this->category_id = $id;
            } else {
                $this->category_id = false;
            }
        }

        if ($this->created_at) {
            $this->created_at = strtotime($this->created_at);
        }

        if ($this->updated_at) {
            $this->updated_at = strtotime($this->updated_at);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            //->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }

    /**
     * @return array
     */
    public static function categoryIdToName()
    {
        $category = Category::find()
            ->select(['name','id'])
            ->indexBy('id')
            ->asArray()
            ->all();
        $categoryArray = [];
        foreach ($category as $k => $v) {
            $categoryArray[$k] = $v['name'];
        }
        return $categoryArray;
    }
}