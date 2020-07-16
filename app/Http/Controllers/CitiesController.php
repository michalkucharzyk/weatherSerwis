<?php

namespace App\Http\Controllers;

use App\Cities;
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
       dd($this->modelCities->getAllId());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('Cities/citiesForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //sprawdzić czy w bazie już taki istaniej jak tak to nie dodawac a error wyrzucic
        $validatedData = $request->validate([
            'city' => 'required|max:255',
        ]);
        $this->weatherConnect = new WeatherConnect(1, $request->city);
        $dataApi = $this->weatherConnect->getWeather();
        if($dataApi)
        {
            if($this->modelCities->insert($dataApi))
                return redirect()->route('cities.index')->withSuccess(['Save city Success']);
            else
                return redirect()->back()->withErrors('Save city Error!');
        }else
            return redirect()->back()->withErrors('There is no such city');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
