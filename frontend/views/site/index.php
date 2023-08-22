<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
// use common\models\Type;


/** @var yii\web\View $this */

$this->title = 'PokeDEX';

echo Html::a("Add pokemon", ["add"], ['class' => 'btn btn-dark']);


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        [
            'attribute' => 'type',
            // 'filter' => ['normal'=>'normal', 'fighting'=>'fighting''flying'=>'flying''poison'=>'poison''ground'=>'ground''rock'=>'rock''bug'=>'bug''ghost'=>'ghost''steel'=>'steel''fire'=>'fire''water'=>'water''grass'=>'grass''electric'=>'electric''psychic'=>'psychic''ice'=>'ice''dragon'=>'dragon''dark'=>'dark''fairy'=>'fairy''unknown'=>'unknown''shadow'=>'shadow']
            'value' => function ($model) {
                return implode(',', ArrayHelper::map($model->type, 'id', 'title'));
                    },
         ],
        ['class' => 'yii\grid\ActionColumn']
    ],
]);
?>
