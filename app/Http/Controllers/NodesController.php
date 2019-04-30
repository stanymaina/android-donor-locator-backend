<?php

namespace App\Http\Controllers;

use App\Node;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\NodeResource;

class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // return NodeResource::collection(Node::all());

        // $payloads = Payload::orderBy('created_at', 'desc')->take(5)->get();

        $date = Carbon::now();
        $fromDate = new Carbon('last monday'); 
        // $date=$date->toDateTimeString();
        // $fromDate =$fromDate->toDateTimeString();
        $array = compact('date','fromDate');
        // $toDate = new CarbonImmutable::now();
        // $toDate = new Carbon('now'); 
        // $payloads = Payload::where('created_at', '>', new Carbon('-1 day'))->get();

        $nodes = Node::orderBy('created_at', 'desc')->take(5)->get();
        // $payloads = Node::orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Payloads retrieved Succesfully',
            'nodes'=> $nodes
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
        //return $request->all();
        $node   =   new Node;
        $node->altitude     =    $request->input('payload_fields.altitude');
        $node->humidity     =    $request->input('payload_fields.humidity');
        $node->lux          =    $request->input('payload_fields.lux');
        $node->pressure     =    $request->input('payload_fields.pressure');
        $node->soilMoisture =    $request->input('payload_fields.soilMoisture');
        $node->temperature  =    $request->input('metadata');
        // $node->temperature  =    [$request->input('payload_fields.temperature')];
        $node->save();

        return new NodeResource($node);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function show(Node $node)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function edit(Node $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Node $node)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function destroy(Node $node)
    {
        //
    }
}
