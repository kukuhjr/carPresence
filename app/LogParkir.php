<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogParkir extends Model
{
    protected $table = 'log_parkir';

    protected $primaryKey = 'id_log';

    public $timestamps = false;

    /**
     * Get the parking space that owns the log.
     */
    public function parkir()
    {
        return $this->belongsTo(Parkir::class, 'id_parkir', 'sensor_name');
    }
}
