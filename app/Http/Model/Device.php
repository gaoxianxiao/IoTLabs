<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'device';
    protected $primaryKey = 'dev_id';
    public $timestamps = false;
    protected $guarded = [];
}
