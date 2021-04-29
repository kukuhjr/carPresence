<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogParkir extends JsonResource
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
            'id_log' => $this->id_log,
            'id_parkir' => $this->id_parkir,
            'start' => $this->start,
            'end' => $this->end
        ];
    }
}
