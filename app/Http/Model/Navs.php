<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    protected $table = 'navs';
    protected $primaryKey = 'navs_id';
    public $timestamps = false;
    protected $guarded = [];
}
