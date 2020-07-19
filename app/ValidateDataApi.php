<?php


namespace App;


class ValidateDataApi
{
    /**
     * @var
     */
    private $modelCities;

    /**
     * @var
     */
    private $dataApi;

    /**
     * @var
     */
    private $messages;

    /**
     * @var
     */
    private $countCity = 10;

    /**
     * ValidateDataApi constructor.
     * @param Cities $modelCities
     * @param $dataApi
     */
    public function __construct(Cities $modelCities, $dataApi)
    {
        $this->modelCities = $modelCities;
        $this->dataApi = $dataApi;

    }

    /**
     * @return array
     */
    public function validateInsertData()
    {
        $this->messages = [];
        $this->validateIssetCityInApi();
        if (empty($this->messages))
        {
            $this->validateCountryPLCity();
            $this->validateCountCity();
            $this->validateIssetCityInDB();
        }
        return $this->messages;
    }

    /**
     * @param null $idIgnoreCity
     * @return array
     */
    public function validateData($idIgnoreCity = null)
    {
        $this->messages = [];
        $this->validateCodeApi();
        if (empty($this->messages))
        {
            $this->validateCountryPLCity();
            if (!$idIgnoreCity)
                $this->validateCountCity();

            $this->validateIssetCityInDB($idIgnoreCity);
        }
        return $this->messages;
    }

    /**
     *
     */
    private function validateCodeApi()
    {
        if (!is_array($this->dataApi))
        {
            switch ($this->dataApi)
            {
                case 404:
                    $this->messages[] = __('validation.not_exist_city');
                    break;
                case 401:
                    $this->messages[] = __('validation.wrong_api_key');
                    break;
                default:
                    $this->messages[] = __('validation.error_api');
                    break;
            }
        }
    }

    /**
     *
     */
    private function validateIssetCityInApi()
    {
        if (!$this->dataApi)
        {

        }
    }

    /**
     * @param null $idIgnoreCity
     */
    private function validateIssetCityInDB($idIgnoreCity = null)
    {
        if (!$idIgnoreCity)
            $countCity = $this->modelCities->getByNameCity($this->dataApi['name']);
        else
            $countCity = $this->modelCities->getByNameCity($this->dataApi['name'], $idIgnoreCity);

        if ($countCity !== 0)
            $this->messages[] = __('validation.exist_city_db');
    }

    /**
     *
     */
    private function validateCountCity()
    {
        $countCitiesDB = $this->modelCities->getCountCities();
        if ($this->countCity <= $countCitiesDB)
            $this->messages[] = __('validation.max_add_city', ['count' => $this->countCity]);
    }

    /**
     *
     */
    private function validateCountryPLCity()
    {
        if ($this->dataApi['sys']['country'] !== 'PL')
            $this->messages[] = __('validation.cities_no_pl');
    }
}