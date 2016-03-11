<?php

namespace backend\modules\page\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\page\models\Page;

/**
 * PageSearch represents the model behind the search form about `backend\models\Page`.
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'integer'],
            [['title', 'content', 'meta_title', 'meta_description', 'alias'], 'safe'],
            [['created_at', 'updated_at'], 'date', 'format' => 'php:d.m.Y'],
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
        $query = Page::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'alias', $this->alias]);
            
        $query
            ->andFilterWhere(['>=', 'created_at', $this->created_at ? strtotime($this->created_at . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'created_at', $this->created_at ? strtotime($this->created_at . ' 23:59:59') : null]);

        return $dataProvider;
    }
}
