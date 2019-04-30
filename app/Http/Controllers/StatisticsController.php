<?php

namespace App\Http\Controllers;

use App\Payload;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
   
    public function dailyData(){
        // $payloads = Payload::orderBy('created_at', 'desc')->take(5)->get();

        $payloads = Payload::where('created_at', '>', new Carbon('-1 day'))
                            ->orderBy('created_at','desc')
                            ->take(10)
                            ->get();

        foreach($payloads as $payload){
            $payload_field  = $payload->payload_fields;
            $created_at     = $payload->created_at;
            // $created_at     = $created_at->toDateTimeString();
            // return compact('payload_field', 'created_at');

            // $date = new \DateTime('2000-01-20');
            // $date = $created_at->sub('-30 minutes');
            // var_dump($date);
            // $date->sub(new \DateInterval('P7Y5M4DT4H3M2S'));
            // $date->sub('-30 minutes');
            // echo $date->format('Y-m-d H:i:s') . "\n";

            $date = new \DateTime();
            $interval = new \DateInterval("PT15M");
            $interval->invert = 1;
            $date->sub($interval);
            echo $date->format("c") . "\n";
            
            $payloadss[] = [
                'fields'=> $payload_field,
                'time'  => $date
            ];
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Payloads retrieved Succesfully',
            'payloads'=> $payloadss
        ]);
    }
}
