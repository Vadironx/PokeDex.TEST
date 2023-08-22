<?php

namespace console\controllers;

use yii\console\Controller;
use yii\httpclient\Client;
use common\models\Pokemons;
use common\models\Type;

class PokemonController extends Controller
{
    public function actionGetAll()
    {
        $client = new Client();
        $response = $client->createRequest()
        ->setMethod('GET')
        ->setUrl('http://pokeapi.co/api/v2/pokemon')
        ->setData(['limit' => 1300, 'offset' => 0])
        ->send();

        foreach ($response->data['results'] as $pokemon){
                $pokemons = new Pokemons();
                $pokemons->name = $pokemon['name'];
                $url = $pokemon['url'];
              
                $pokemons->save();
                $response2 = $client->createRequest()
                ->setMethod('GET')
                ->setUrl($url)
                ->send();
                foreach ($response2->data['types'] as $types)
                {
                    $type = new Type();
                    $type->title = $types['type']['name'];
                    $type->pokemons_id = $pokemons->id;
                    $type->save();
                }

        }     
    }
}