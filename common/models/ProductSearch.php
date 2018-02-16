<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\product;

/**
 * ProductSearch represents the model behind the search form about `common\models\product`.
 */
class ProductSearch extends product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stock_count', 'discount_type', 'brand_id', 'city_id', 'category_id', 'created_at', 'update_at', 'created_by', 'updated_by', 'status','subcategory_id'], 'integer'],
            [['name', 'price', 'short_detail', 'detail', 'image', 'slug', 'alt_name'], 'safe'],
            [['discount'], 'number'],
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
        $query = product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'stock_count' => $this->stock_count,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'brand_id' => $this->brand_id,
            'city_id' => $this->city_id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
            'subcategory_id'=>$this->subcategory_id
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'short_detail', $this->short_detail])
             ->andFilterWhere(['like', 'category_id', $this->category_id])
            // ->andFilterWhere(['like', 'subcategory_id', $this->subcategory_id])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'image', $this->image])
            //->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'alt_name', $this->alt_name]);
           
        return $dataProvider;
    }
}
