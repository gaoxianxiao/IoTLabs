<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Variate extends Model
{
    protected $table = 'variate';
    protected $primaryKey = 'var_id';
    public $timestamps = false;
    protected $guarded = [];
}
