<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Pokemons;
// use common\models\Type;
use yii\data\ActiveDataProvider;

class PokemonsSearch extends Pokemons
{
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

    // public $typeTittle;

    // public function afterSave($insert, $changedAttributes) {
    //     $type = new Type();
    //     $type->title = $this->$typeTittle;
    //     $type->pokemons_id = $this->id;
    //     $type->save();
    //     parent::afterSave($insert, $changedAttributes);

    // }

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

        
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'type', $this->type]);


        return $dataProvider;
    }
}

/*class PokemonSearchForm extends Model
{
public function search()
{
    $searchModel = new PokemonSearch();
    $dataProvider = new ActiveDataProvider([
        'query' => Pokemons::find(),
        'pagination' => [
            'pageSize' => 20,
        ],
        $searchModel->search(yii::$app->request->get()),
    ]);
    return $this->render('index', [
        'dataProvider' => $dataProvider, 
        'searchModel' => $searchModel,
    ]);
    /*$searchModel = new PokemonSearch();
    dump(yii::$app->request->get());
    $provider =  $searchModel->search(yii::$app->request->get());
    return $this->render(view: 'index', [
        'provider' => $provider, 
        'searchModel' => $searchModel,
    ]);
    /*$dataProvider = new ActiveDataProvider([
        'query' => Pokemons::find(),
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);
    return $this->render('index', ['dataProvider'=> $dataProvider]);
}
}*/