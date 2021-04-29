<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LogParkir as LogParkirResource;

class Parkir extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'sensor_name' => $this->sensor_name,
            'variable_name' => $this->variable_name,
            'status' => $this->status,
            'level' => $this->level,
            'warn_detect' => $this->warn_detect,
            'location' => $this->loc_name,
            'logs' => LogParkirResource::collection($this->logs)
        ];
    }

    public function with($request){
        return [
            'version' => '1.0.0',
            'author_url' => url('#')
        ];
    }
}
