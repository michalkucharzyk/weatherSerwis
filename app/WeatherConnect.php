<?php


namespace App;

use Illuminate\Support\Facades\Http;

class WeatherConnect
{
    /**
     * @var null
     */
    private $urlBase = 'http://api.openweathermap.org/data/2.5/';

    /**
     * @var null
     */
    private $apiKey = '4e6dc0cc78dea98c6d36abd147dddc0b';

    /**
     * @var null
     */
    private $methodApi = null;
    /**
     * @var null
     */
    private $params = null;

    /**
     * @var Cities|null
     */
    private $modelCities = null;

    /**
     * @var null
     */
    private $url = null;

    /**
     * WeatherConnect constructor.
     * @param null $methodApi 1 = get weather for one city, 2 = get weather for several cities
     * @param null $params
     */
    public function __construct($methodApi = null, $params = null)
    {
        $this->methodApi = $methodApi;
        $this->params = $params;
        $this->modelCities = new Cities();
        if($params);
          $this->setUrl();
    }

    /**
     *
     */
    public function getWeather()
    {
        $response = Http::get($this->getUrl());

        if($this->checkConnection($response->status()))
        {
           return $response->json();
        }
        return null;
    }

    /**
     * @param $status
     * @return bool
     */
    private function checkConnection($status)
    {
        if($status == 200)
            return true;
        else
            return false;
    }

    /**
     *
     */
    private function setUrl(): void
    {
        switch ($this->methodApi)
        {
            case 1 :
            {
                $dataParams = array(
                    'q' => $this->params,
                    'appid' => $this->apiKey,
                );
                $this->url = $this->urlBase.'weather?'. http_build_query($dataParams);
                break;
            }
            case 2 :
            {
                if (is_array($this->params))
                {
                    $dataParams = array(
                        'id' => implode(",", $this->params),
                        'appid' => $this->apiKey,
                        'units' => 'metric'
                    );
                    $this->url = $this->urlBase.'group?'. http_build_query($dataParams);
                }
                break;
            }
        }
    }

    /**
     * @return null
     */
    private function getUrl()
    {
        return $this->url;
    }
}