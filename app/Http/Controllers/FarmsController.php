<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $payloads = Node::orderBy('created_at', 'desc')->take(5)->get();
        $farms = Farm::orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Farms retrieved Succesfully',
            'payloads'=> $farms
        ]);
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
        $location[] = [
            'longitude' => $request->input('farm_longitude'),
            'latitude' => $request->input('farm_latitude'),
            'county' => $request->input('farm_county')
        ];

        $size[] = [
            'size' => $request->input('farm_size'),
            'units' => $request->input('farm_size_unit')
        ];
        
        $farm = new Farm;
        $farm->identifier   =  $request->input('farm_identifier'); 
        $farm->location =   $location;
        $farm->size     =   $size;
        $farm->save();

        $farms = Farm::all();

        return response()->json([
            'success' => true,
            'message' => 'Farm added Succesfully',
            'farms'=> $farms
        ]);
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
