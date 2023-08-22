<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Pokemons;
use yii\data\ActiveDataProvider;

class PokemonsSearch extends Pokemons
{
    public $type;
    public function rules()
    {
        
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
            [['type'], 'safe'],

        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }



    public function search($params)
    {
        $query = Pokemons::find();
        $query->joinWith('type');
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere(['pokemons.id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'type.title', $this->type]);


        return $dataProvider;
    }
}
