<?php
namespace backend\modules\dashboard\models;

use Yii;
use yii\base\Object;


class Metrika extends Object
{
    const HOST = "https://api-metrika.yandex.ru/stat/v1/data";
    const SUMMARY_DAILY = "&metrics=ym:s:visits,ym:s:pageviews,ym:s:users,ym:s:percentNewVisitors&date1=today&date2=today";
    const TRAFFIC = "&preset=traffic&dimensions=ym:s:datePeriod<group>&group=day&sort=ym:s:datePeriod<group>&metrics=ym:s:visits,ym:s:users&date1=13daysAgo&date2=today";
    const SOURSES = "&dimensions=ym:s:<attribution>TrafficSource&metrics=ym:s:visits&date1=13daysAgo&date2=today";
    
    public function getData($i)
    {
        switch ($i) {
            case "daily_summary":
                $parametrs = self::SUMMARY_DAILY;
                break;
            case "traffic":
                $parametrs = self::TRAFFIC;
                break;
            case "sources":
                $parametrs = self::SOURSES;
                break;
        }
        
        $url = $this->setUrl($parametrs);
        return $this->curl($url);
    }
    
    private function setUrl($parametrs) 
    {
        return self::HOST.'?ids='.Yii::$app->settings->get('metrika.counter').$parametrs.'&oauth_token='.Yii::$app->settings->get('metrika.token');
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