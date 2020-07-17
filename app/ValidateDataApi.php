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
        $this->validateIssetCityInApi();
        if (empty($this->messages))
        {
            $this->validateCountryPLCity();
            if(!$idIgnoreCity)
                $this->validateCountCity();

            $this->validateIssetCityInDB($idIgnoreCity);
        }
        return $this->messages;
    }

    /**
     *
     */
    private function validateIssetCityInApi()
    {
        if (!$this->dataApi)
        {
            $this->messages[] = 'There is no such city';
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
            $this->messages[] = 'This city is already on the list';
    }

    /**
     *
     */
    private function validateCountCity()
    {
        $countCitiesDB = $this->modelCities->getCountCities();
        if ($this->countCity <= $countCitiesDB)
            $this->messages[] = 'You can add 10 cities';
    }

    /**
     *
     */
    private function validateCountryPLCity()
    {
        if ($this->dataApi['sys']['country'] !== 'PL')
            $this->messages[] = 'You can only add cities from Poland';
    }
}