<?php
namespace backend\modules\dashboard\models;

use Yii;
use yii\base\Object;

class Metrika extends Object
{
    const HOST = "https://api-metrika.yandex.ru";
    const GET_TOKEN = '/auth/get_token';
    
    const TRAFFIC = '/stat/traffic/summary';
    const SOURCES ='/stat/sources/summary';
    const GEO = '/stat/geo';
    const CONTENT = '/stat/content/popular';
    
    public $counter = '21869497';
    public $token = '36a00bef64db456aa4eb41cad2203c31';
    
    public $id;
    
    
    public function getData($type_data)
    {
        $url = $this->setUrl($type_data);
        return $this->curl($url);
    }
    
    private function setUrl($type_data) 
    {
        return self::HOST . $type_data . '.json?id=' . $this->counter . '&pretty=1' . '&oauth_token=' . $this->token;
    }
    
    public function curl( $url, $params = [] )
	{
		$ch = curl_init( );
		$options = [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 30,
		];
        if(!empty($params))
            $options[CURLOPT_POSTFIELDS] = $params;
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt_array( $ch, $options );
		$result = curl_exec( $ch );
		curl_close( $ch );
		
		return $result;
	}
	
}