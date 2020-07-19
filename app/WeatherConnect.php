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
        if ($params)
            $this->setUrl();
    }

    /**
     *
     */
    public function getWeather()
    {
        $response = Http::get($this->getUrl());

        if ($this->checkConnection($response) === true)
        {
            return $response->json();
        }
        return $response->status();
    }

    /**
     * @param $response
     * @return bool
     */
    private function checkConnection($response)
    {
        if ($response->status() == 200)
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
                    'lang' => 'pl',
                );
                $this->url = $this->urlBase . 'weather?' . http_build_query($dataParams);
                break;
            }
            case 2 :
            {
                if (is_array($this->params))
                {
                    $dataParams = array(
                        'id' => implode(",", $this->params),
                        'appid' => $this->apiKey,
                        'lang' => 'pl',
                        //'units' => 'metric' wtedy dostaniemy w stopniach Celsiusza temperaturę
                        //użyłem bez ponieważ chciałem stworzyć klasę do zamienia jednostek.
                    );
                    $this->url = $this->urlBase . 'group?' . http_build_query($dataParams);
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