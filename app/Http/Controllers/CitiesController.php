<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Http\Requests\ValidateInsertCity;
use App\Http\Requests\ValidateUpdateCity;
use App\ValidateDataApi;
use App\WeatherConnect;
use Illuminate\Http\Request;

class CitiesController extends Controller
{

    /**
     * @var null
     */
    private $weatherConnect = null;

    /**
     * @var null
     */
    private $modelCities =null;

    public function __construct()
    {
        $this->modelCities = new Cities();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $dataDb = $this->modelCities->all();
       return view('Cities/citiesIndex', ['dataDb'=>$dataDb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('Cities/citiesFormInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateInsertCity $request)
    {
        $this->weatherConnect = new WeatherConnect(1, $request->city);
        $dataApi = $this->weatherConnect->getWeather();

        $vDataApi = new ValidateDataApi($this->modelCities, $dataApi);
        $statusValidate = $vDataApi->validateData();

        if(count($statusValidate))
            return redirect()->back()->withErrors($statusValidate);

        if($this->modelCities->insert($dataApi))
            return redirect()->route('cities.index')->withSuccess(__('messages.welcome'));
        else
            return redirect()->back()->withErrors('The attempt to add to the database has failed');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = $this->modelCities->find($id);
        return view ('Cities/citiesFormUpdate',['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUpdateCity $request, $id)
    {

        $this->weatherConnect = new WeatherConnect(1, $request->city);
        $dataApi = $this->weatherConnect->getWeather();

        $vDataApi = new ValidateDataApi($this->modelCities, $dataApi);
        $statusValidate = $vDataApi->validateData($id);

        if(count($statusValidate))
            return redirect()->back()->withErrors($statusValidate);

        if($this->modelCities->updateNameById($id, $dataApi))
            return redirect()->route('cities.index')->withSuccess('Update city Success');
        else
            return redirect()->back()->withErrors('The attempt to update to the database has failed');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if($this->modelCities->deleteCityById($id))
            return redirect()->route('cities.index')->withSuccess('Delete Success');
        else
            return redirect()->route('cities.index')->withErrors('Delete has failed');

    }
}
