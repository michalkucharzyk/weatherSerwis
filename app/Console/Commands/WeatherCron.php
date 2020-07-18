<?php

namespace App\Console\Commands;

use App\Cities;
use App\WeatherConnect;
use Illuminate\Console\Command;

class WeatherCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating weather data';

    /**
     * @var null
     */
    private $weatherConnect = null;

    /**
     * @var Cities
     */
    private $modelCities;

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
        $this->modelCities = new Cities();
        $this->weatherConnect = new WeatherConnect(2, $this->modelCities->getAllId());

    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $data = $this->weatherConnect->getWeather();
        if (is_array($data))
        {
            foreach ($data['list'] as $item)
            {
                $this->modelCities->updateByIdOpenWeather($item);
            }
            $this->info(__('messages.success_update_date_api'));
        } else
        {
            $this->info(__('messages.field_update_date_api'));
        }

    }
}
