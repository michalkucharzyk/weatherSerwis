<?php


namespace App;


class  ConvertUnits
{
    /**
     * @param $fahrenheit
     * @return float
     */
    public static function convertFahrenheitToCelsius($fahrenheit)
    {
        return ($fahrenheit - 32) / 1.8;
    }

    /**
     * @param $fahrenheit
     * @return float
     */
    public static function convertCelsiusToFahrenheit($celsius)
    {
        return ($celsius * 1.8) + 32;
    }

    /**
     * @param $kelvin
     * @return float
     */
    public static function convertKelvinToCelsius($kelvin)
    {
        return $kelvin - 273.15;
    }

    /**
     * @param $celsius
     * @return float
     */
    public static function convertCelsiusToKelvin($celsius)
    {
        return $celsius + 273.15;
    }
}