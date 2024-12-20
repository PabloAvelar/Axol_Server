<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homehub extends Model
{
    use HasFactory;

    protected $table = 'homehub_devices_practice';

    // Define las columnas que se pueden llenar masivamente
    protected $fillable = [
        'user_id',
        'mac_add',
        'lat',
        'lon',
        'name',
    ];

    protected $primaryKey = 'mac_add';

    public $timestamps = false;
}
