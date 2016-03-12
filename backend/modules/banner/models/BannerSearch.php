<?php

namespace backend\modules\banner\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\banner\models\Banner;

/**
 * BannerSearch represents the model behind the search form about `backend\models\Banner`.
 */
class BannerSearch extends Banner
{
    
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['name', 'link', 'status', 'description'], 'safe'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Banner::find();

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

        $query->andFilterWhere([
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'status', $this->status]);
            

        return $dataProvider;
    }
}
