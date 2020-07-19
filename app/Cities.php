<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    /**
     * @return array
     */
    public function getAllId()
    {
        $dataDB = $this->all();
        $citiesId = array();
        foreach ($dataDB as $city)
        {
            $citiesId[] = $city->id_open_weather;
        }
        return $citiesId;
    }

    /**
     * @param $data
     */
    public function updateByIdOpenWeather($data)
    {
        $this->where('id_open_weather', $data['id'])->update([
            'weather' => json_encode($data),
        ]);
    }

    /**
     * @param $data
     * @return bool
     */
    public function insert($data)
    {
        $this->name = $data['name'];
        $this->id_open_weather = $data['id'];
        $this->country = $data['sys']['country'];
        $this->weather = json_encode($data);
        return $this->save();
    }

    /**
     *
     */
    public function getCountCities()
    {
        return $this->all()->count();
    }

    /**
     * @param $city
     * @param $idIgnoreCity
     * @return mixed
     */
    public function getByNameCity($city, $idIgnoreCity = null)
    {
        if (!$idIgnoreCity)
            return $this->where('name', $city)->get()->count();
        else
            return $this->where('name', $city)->where('id', '!=', $idIgnoreCity)->get()->count();
    }

    /**
     * @param $id
     */
    public function deleteCityById($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * @param $data
     */
    public function updateNameById($id, $data)
    {
        return $this->where('id', $id)->update([
            'name' => $data['name'],
            'id_open_weather' => $data['id'],
            'country' => $data['sys']['country'],
            'weather' => json_encode($data),
        ]);
    }
}
