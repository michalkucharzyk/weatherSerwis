<?php


namespace App;


use App\Cities;

class ParseDataWeather
{

    /**
     * @var Cities
     */
    private $modelCities;

    /**
     * ParseDataWeather constructor.
     */
    public function __construct()
    {
        $this->modelCities = new Cities();
    }

    /**
     *
     */
    public function getData($idCity = null)
    {
        if ($idCity) // AJAX
            return $this->getDataCity($idCity);
        else
            return $this->getDataAllCity();
    }

    /**
     * @param $idCity
     */
    private function getDataCity($idCity)
    {
        $dataDb[] = $this->modelCities->find($idCity);
        return $this->parseDataToArray($dataDb);
    }

    /**
     * @return array
     */
    private function getDataAllCity()
    {
        $dataDb = $this->modelCities->all();
        return $this->parseDataToArray($dataDb);
    }

    /**
     * @param $dataDb
     * @return array
     */
    private function parseDataToArray($dataDb)
    {
        $returnData = [];

        foreach ($dataDb as $item)
        {
            $returnData[$item->id]['name'] = $item->name;
            $returnData[$item->id]['id'] = $item->id;
            $dataWeather = json_decode($item->weather);
            $returnData[$item->id]['temp'] = ConvertUnits::convertKelvinToCelsius($dataWeather->main->temp);
            $returnData[$item->id]['feels_like'] = ConvertUnits::convertKelvinToCelsius($dataWeather->main->feels_like);
            $returnData[$item->id]['temp_min'] = ConvertUnits::convertKelvinToCelsius($dataWeather->main->temp_min);
            $returnData[$item->id]['temp_max'] = ConvertUnits::convertKelvinToCelsius($dataWeather->main->temp_max);
            $returnData[$item->id]['pressure'] = $dataWeather->main->pressure;
            $returnData[$item->id]['humidity'] = $dataWeather->main->humidity;
            $returnData[$item->id]['wind']['speed'] = $dataWeather->wind->speed;
            $returnData[$item->id]['wind']['deg'] = $dataWeather->wind->deg;
            $returnData[$item->id]['sunrise'] = date('H:i', $dataWeather->sys->sunrise);
            $returnData[$item->id]['sunset'] = date('H:i', $dataWeather->sys->sunset);
            $returnData[$item->id]['clouds'] = $dataWeather->clouds->all;
            $returnData[$item->id]['data_update'] = $item->updated_at;
            $returnData[$item->id]['current_time'] = date('Y-m-d H:i:s');
        }
        return $returnData;
    }
}