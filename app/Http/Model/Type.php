<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'type_id';
    public $timestamps = false;
    protected $guarded = [];
}
