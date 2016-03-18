<?php
namespace backend\modules\dashboard\models;

use Yii;
use yii\base\Object;


class MetrikaV2 extends Object
{
    const HOST = "https://api-metrika.yandex.ru/stat/v1/data";
    const SUMMARY_DAILY = "&metrics=ym:s:visits,ym:s:pageviews,ym:s:users,ym:s:percentNewVisitors&date1=today&date2=today";
    const TRAFFIC_MONTH = "";
    
    
    public function getData($i)
    {
        switch ($i) {
            case "daily_summary":
                $parametrs = self::SUMMARY_DAILY;
                break;
            case "traffic_month":
                $parametrs = self::TRAFFIC_MONTH;
                break;
        }
        
        $url = $this->setUrl($parametrs);
        return $this->curl($url);
    }
    
    private function setUrl($parametrs) 
    {
        return self::HOST.'?id='.Yii::$app->settings->get('metrika.counter').$parametrs.'&oauth_token='.Yii::$app->settings->get('metrika.token');
    }
    
    
    public function curl( $url, $params = [] )
	{
		$ch = curl_init();
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