<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $table = 'parkirs';

    // protected $primaryKey = 'table_id';

    public $timestamps = true;

    /**
     * Get the logs for parking space.
     */
    public function logs()
    {
        return $this->hasMany(LogParkir::class, 'id_parkir', 'sensor_name');
    }
}
