<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Gateway;
use App\Node;
use App\Payload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $payloads = Payload::orderBy('created_at', 'desc')->take(5)->get();

        $date = Carbon::now();
        $fromDate = new Carbon('last monday'); 
        // $date=$date->toDateTimeString();
        // $fromDate =$fromDate->toDateTimeString();
        $array = compact('date','fromDate');
        // $toDate = new CarbonImmutable::now();
        // $toDate = new Carbon('now'); 

        // $payloads = Payload::where('created_at', '>', new Carbon('-1 day'))->get();

        $payloads = Payload::orderBy('created_at', 'desc')->take(5)->get();
        // $payloads = Node::orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Payloads retrieved Succesfully',
            'payloads'=> $payloads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payloads = Payload::orderBy('created_at', 'desc')->take(3)->first();
        
        return response()->json([
            'success' => true,
            'message' => 'Payloads retrieved Succesfully',
            'payloads'=> $payloads
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $payload                =   new Payload;
        $payload->app_id        =    $request->input('app_id');
        $payload->device_id     =    $request->input('dev_id');
        $payload->hardware_serial =  $request->input('hardware_serial');
        $payload->port          =    $request->input('port');
        $payload->payload_raw   =    $request->input('payload_raw');
        $payload->payload_fields  =  $request->input('payload_fields');
        $payload->metadata      =    $request->input('metadata');
        $payload->downlink_url  =    $request->input('downlink_url');
        $payload->save();

        $validator = Validator::make($request->all(), [
            'dev_id' => 'required|unique:nodes|max:255'
        ]);

        if ($validator->fails()) {
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
        } else {

            $node                =   new Node;
            $node->device_id     =   $request->input('dev_id');
            $node->save();
        }

        // $node                =   new Node;
        // $node->device_id     =   $request->input('dev_id');
        // $node->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payload  $payload
     * @return \Illuminate\Http\Response
     */
    public function show(Payload $payload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payload  $payload
     * @return \Illuminate\Http\Response
     */
    public function edit(Payload $payload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payload  $payload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payload $payload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payload  $payload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payload $payload)
    {
        //
    }
}