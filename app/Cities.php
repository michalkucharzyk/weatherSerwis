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
        foreach($dataDB as $city) {
            $citiesId[] = $city->id_open_weather;
        }
        return $citiesId;
    }

    /**
     * @param $data
     */
    public function updateByIdOpenWeather ($data)
    {
        $this->where('id_open_weather',$data['id'])->update([
            'weather' => json_encode($data),
        ]);
    }

    public function insert($data)
    {
        $this->name = $data['name'];
        $this->id_open_weather = $data['id'];
        $this->country = $data['sys']['country'];
        $this->weather = json_encode($data);
        return $this->save();
    }
}
