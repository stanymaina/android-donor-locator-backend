<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // 'payload_fields' => [
            //     'altitude'  =>  $this->altitude,
            //     'humidity'  =>  $this->humidity,
            //     'lux'  =>  $this->lux,
            //     'pressure'  =>  $this->pressure,
            //     'soilMoisture'  =>  $this->soilMoisture,
            //     'temperature'  =>  $this->temperature,
            // ],
            'altitude'  =>  $this->altitude,
            'humidity'  =>  $this->humidity,
            'lux'  =>  $this->lux,
            'pressure'  =>  $this->pressure,
            'soilMoisture'  =>  $this->soilMoisture,
            'temperature'  =>  $this->temperature,
        ];
    }
}
