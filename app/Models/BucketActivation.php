<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketActivation extends Model
{
    use HasFactory;

    protected $table = 'bucket_activationsdb_practice';

    protected $fillable = [
        'mac_add',
        'datetime',
    ];

    protected $primaryKey = 'mac_add';
    public $timestamps = false;
}
