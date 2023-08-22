<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\validators;
use common\models\Type;

class Pokemons extends ActiveRecord
{
    public static function tableName()
    {
        return 'pokemons';
    }

    public $typeName;

    public function afterSave($insert, $changedAttributes) {
        $type = new Type();
        $type->title = $this->typeName;
        $type->pokemons_id = $this->id;
        $type->save();
        parent::afterSave($insert, $changedAttributes);

    }


    public function getType() 
    {
        return $this->hasMany(Type::class, ['pokemons_id' => 'id']);
    } 

    public function rules()
    {
        return
        [
            ['name', 'string', 'length' => [1, 128]],
            ['typeName', 'string', 'length' => [1, 128]],
            // [['id', 'type'], 'safe'],
            [['id'], 'safe'],
        ];
        
    }
}
