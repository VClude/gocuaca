<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;
use App\Models\Pos;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prov = Pos::select('provinsi')->distinct()->get();
        return view('welcome')->with('prov',$prov);
    }

    public function indexDate()
    {
        $prov = Pos::select('provinsi')->distinct()->get();
        return view('bydate')->with('prov',$prov);
    }

    public function getKabupaten($txt)
    {
        if(!$txt){
            return response()->json('missing parameter : Provinsi');
        }
        $kab = Pos::select("kabupaten")
                    ->where("provinsi",$txt)
                    ->distinct()
                    ->pluck("kabupaten");
        return response()->json($kab);    
    }

    public function getKecamatan($txt)
    {
        if(!$txt){
            return response()->json('missing parameter : Kabupaten');
        }
        $kab = Pos::select("kecamatan")
                    ->where("kabupaten",$txt)
                    ->distinct()
                    ->pluck("kecamatan");
        return response()->json($kab);    
    }

    public function getKelurahan($txt)
    {
        if(!$txt){
            return response()->json('missing parameter : Kecamatan');
        }
        $kab = Pos::where("kecamatan",$txt)
                    ->distinct()
                    ->pluck("kelurahan","kodepos");
        return response()->json($kab);    
    }

    public function getWeather($id)
    {
        if(!$id){
            return response()->json('missing parameter : kelurahan');
        }
        $cuaca = new Weather();
        $info = $cuaca->getCurrentByCity($id.',ID');
        return response()->json($info);    
    }

    public function getWeatherDate($id,$date)
    {
        if(!$id){
            return response()->json('missing parameter : kelurahan');
        }
        if(!$date){
            return response()->json('missing parameter : date');
        }
        $filtered_array =[];
        $cuaca = new Weather();
        $info = $cuaca->get3HourlyByCity($id.',ID');
        foreach($info->list as $i){
            if (strpos($i->dt_txt, $date) !== false) {
                array_push($filtered_array, $i);
            }
        }
        return response()->json($filtered_array);    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
